<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardEventController extends Controller
{
    // Event data should be persisted externally (database or session).
    // Removed inline dummy data to keep controller clean.
    private $events = [];

    // Method untuk menambahkan Slug dan Asset
    private function prepareEventData($event)
    {
        // 1. Tambahkan Slug berdasarkan Judul
        $event['slug'] = Str::slug($event['judul']);
        // 2. Tambahkan Asset ke Foto
        $event['foto'] = asset($event['foto']);
        return $event;
    }

    /**
     * Return events stored in session (fallback to default $this->events).
     */
    private function getEventsFromSession(): array
    {
        $events = session('events');

        if (!is_array($events) || empty($events)) {
            session(['events' => $this->events]);
            return $this->events;
        }

        return $events;
    }

    /**
     * Save events array to session.
     */
    private function saveEventsToSession(array $events): void
    {
        session(['events' => $events]);
    }

    /**
     * Admin listing for dashboard (CRUD index).
     */

    public function index()
    {
        // Panggil prepareEventData untuk setiap item
        $listevent = Event::with(['creator', 'category'])->get();
        $listevent = Event::paginate(10)->withQueryString();
        $categories = Category::all();
        return view('dashboard.events.events', compact('listevent', 'categories'), ['title' => 'List Event']);
    }

    public function show($slug) // Menerima $slug, bukan $id
    {
        // 1. Cari event berdasarkan SLUG
        // Kita harus membuat slug saat mencari, karena data asli $this->events belum memiliki slug
        $event = collect($this->events)->first(function ($event) use ($slug) {
            return Str::slug($event['judul']) === $slug;
        });

        if (!$event) {
            abort(404, 'Event tidak ditemukan.');
        }

        // 2. Tambahkan asset() dan slug ke data yang ditemukan sebelum dikirim ke view
        $event = $this->prepareEventData($event);

        return view('front-page.event.show', [
            'detail' => $event,
            'title' => 'Detail Event: ' . $event['judul']
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.events.create', compact('categories'), ['title' => 'Create Event']);
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
                'start_date_time' => 'required|date|after_or_equal:today',
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
                'start_date_time.after_or_equal' => 'Tanggal mulai event tidak boleh sebelum hari ini.',
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
        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Show edit form for an event in dashboard.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $event = Event::find($id);
        if (!$event) {
            abort(404, 'Event tidak ditemukan.');
        }

        return view('dashboard.events.edit', compact('event', 'categories'), ['title' => 'Edit Event']);
    }

    /**
     * Update event stored in session.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'category' => 'required|exists:categories,id',
                'start_date_time' => 'required|date|after_or_equal:today',
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
                'start_date_time.after_or_equal' => 'Tanggal mulai event tidak boleh sebelum hari ini.',
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
        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Delete an event from session.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image_path) {
            Storage::delete('public/' . $event->image_path);
        }
        $event->delete();
        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $q = $request->query('q');
        $category = $request->query('category');

        $events = Event::with('category')
            ->when($q, function ($query) use ($q) {
                $query->where('title', 'LIKE', "%{$q}%");
            })
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($q2) use ($category) {
                    $q2->where('id', $category);
                });
            })
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get();

        $html = view('dashboard.events.partials.table-rows', compact('events'))->render();

        return response()->json([
            'html' => $html
        ]);
    }
}
