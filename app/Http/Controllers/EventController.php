<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Registrant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Method untuk menambahkan Slug dan Asset
    private function prepareEventData($event)
    {
        // 1. Tambahkan Slug berdasarkan Judul
        $event['slug'] = Str::slug($event['title']);
        return $event;
    }

    public function index(Request $request)
    {
        $categories = Category::all();

        $q = $request->input('search');
        $field = $request->input('filter'); // title | location (search field)
        $categoryId = $request->input('category');
        $when = $request->input('when'); // upcoming | past

        $query = Event::with(['creator', 'category']);

        if ($q) {
            if (in_array($field, ['title', 'location'])) {
                $query->where($field, 'like', "%{$q}%");
            } else {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('location', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%");
                });
            }
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($when === 'upcoming') {
            $query->where('end_date_time', '>=', now());
        } elseif ($when === 'past') {
            $query->where('end_date_time', '<', now());
        }

        // Default ordering by start date desc
        $query->orderBy('start_date_time', 'desc');

        $listevent = $query->paginate(12)->withQueryString();

        return view(
            'front-page.event.index',
            ['listevent' => $listevent, 'categories' => $categories],
            ['title' => 'List Event']
        );
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $field = $request->input('filter'); // title | location
        $categoryId = $request->input('category');
        $when = $request->input('when');

        $query = Event::with(['category']);

        if ($q) {
            if (in_array($field, ['title', 'location'])) {
                $query->where($field, 'like', "%{$q}%");
            } else {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('location', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%");
                });
            }
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($when === 'upcoming') {
            $query->where('end_date_time', '>=', now());
        } elseif ($when === 'past') {
            $query->where('end_date_time', '<', now());
        }

        $query->orderBy('start_date_time', 'desc');

        $events = $query->paginate(12)->appends($request->only(['q', 'filter', 'category', 'when']));

        $html = view('front-page.event.partials.cards', ['events' => $events])->render();
        $pagination = '';
        if ($events->hasPages()) {
            $pagination = view('front-page.event.partials.pagination', ['paginator' => $events])->render();
        }

        return response()->json([
            'html' => $html,
            'pagination' => $pagination,
            'count' => $events->total(),
        ]);
    }

    public function show($slug) // Menerima $slug, bukan $id
    {
        // 1. Cari event berdasarkan SLUG
        // Kita harus membuat slug saat mencari, karena data asli $this->events belum memiliki slug
        $event = collect(Event::all())->first(function ($event) use ($slug) {
            return Str::slug($event['title']) === $slug;
        });

        if (!$event) {
            abort(404, 'Event tidak ditemukan.');
        }

        // 2. Tambahkan asset() dan slug ke data yang ditemukan sebelum dikirim ke view
        $event = $this->prepareEventData($event);

        $allRegistrants = Registrant::where('event_id', $event->id)->get();
        $registrants = Registrant::with('user')->where('event_id', $event->id)->take(5)->get();
        $registrantsCount = Registrant::where('event_id', $event->id)->count();
        $isRegistered = Registrant::where('event_id', $event->id)
            ->where('user_id', Auth::user()->id)
            ->exists();

        return view('front-page.event.show', [
            'detail' => $event,
            'title' => 'Detail Event: ' . $event['title'],
            'registrants' => $registrants,
            'registrantsCount' => $registrantsCount,
            'allRegistrants' => $allRegistrants,
            'isRegistered' => $isRegistered,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('front-page.event.form', ['title' => 'Create Event', 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'category' => 'required|exists:categories,id',
                'start_date_time' => 'required|date|after:today',
                'end_date_time' => 'required|date|after:start_date_time',
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'Judul event wajib diisi.',
                'description.required' => 'Deskripsi event wajib diisi.',
                'location.required' => 'Lokasi event wajib diisi.',
                'category.required' => 'Kategori event wajib dipilih.',
                'category.exists' => 'Kategori yang dipilih tidak valid.',
                'start_date_time.required' => 'Tanggal dan waktu mulai event wajib diisi.',
                'start_date_time.after' => 'Tanggal mulai event tidak boleh sebelum hari ini.',
                'end_date_time.required' => 'Tanggal dan waktu selesai event wajib diisi.',
                'end_date_time.after' => 'Tanggal dan waktu selesai harus sesudah dari tanggal dan waktu mulai.',
                'image_path.required' => 'Gambar event wajib diisi.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('event-images', 'public');
        }

        Event::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'start_date_time' => $request->start_date_time,
            'end_date_time' => $request->end_date_time,
            'location' => $request->location,
            'image_path' => $imagePath,
            'price' => $request->price,
            'status' => $request->status,
            'category_id' => $request->category,
            'creator_id' => Auth::user()->id, // Set creator_id dari user yang sedang login
        ]);
        return redirect()->route('event.show', ['slug' => Str::slug($request->title)])->with('success', 'Event berhasil dibuat!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('front-page.event.form', compact('event', 'categories'), ['title' => 'Edit Event']);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'category' => 'required|exists:categories,id',
                'start_date_time' => 'required|date|after:today',
                'end_date_time' => 'required|date|after:start_date_time',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'Judul event wajib diisi.',
                'description.required' => 'Deskripsi event wajib diisi.',
                'location.required' => 'Lokasi event wajib diisi.',
                'category.required' => 'Kategori event wajib dipilih.',
                'category.exists' => 'Kategori yang dipilih tidak valid.',
                'start_date_time.required' => 'Tanggal dan waktu mulai event wajib diisi.',
                'start_date_time.after' => 'Tanggal mulai event tidak boleh sebelum hari ini.',
                'end_date_time.required' => 'Tanggal dan waktu selesai event wajib diisi.',
                'end_date_time.after' => 'Tanggal dan waktu selesai harus sesudah dari tanggal dan waktu mulai.',
                'image_path.image' => 'Path gambar event harus berupa file gambar.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($event->image_path != null) {
            $imagePath = $event->image_path;
        } else {
            $imagePath = null;
        }
        if ($request->hasFile('image_path')) {
            Storage::delete('public/' . $imagePath);
            $imagePath = $request->file('image_path')->store('event-images', 'public');
        }

        $price = $request->price;
        if ($request->price == null) {
            $price = 0;
        } else {
            $price = $request->price;
        }

        $event->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'start_date_time' => $request->start_date_time,
            'end_date_time' => $request->end_date_time,
            'location' => $request->location,
            'image_path' => $imagePath,
            'price' => $price,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);
        return redirect()->route('event.show', ['slug' => Str::slug($request->title)])->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image_path) {
            Storage::delete('public/' . $event->image_path);
        }
        $event->delete();
        return redirect()->route('profile.creator')->with('success', 'Event berhasil dihapus!');
    }

    public function resign($id)
    {
        $registrant = Registrant::where('event_id', $id)
            ->where('user_id', Auth::user()->id);
        // echo $registrant;
        if (!$registrant) {
            return redirect()->back()->with('error', 'Anda belum terdaftar untuk event ini.');
        }
        $registrant->delete();

        return redirect()->back()->with('success', 'Anda telah berhasil membatalkan pendaftaran dari event ini.');
    }
}
