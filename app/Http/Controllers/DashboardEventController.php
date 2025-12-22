<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

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
        $listevent = Event::with(['creator','category'])->get();
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
        return view('dashboard.events.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|string|max:50',
            'harga' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'alamat_lengkap' => 'required|string|max:500',
        ]);

        // Simpan data event baru ke session-backed events
        $events = $this->getEventsFromSession();

        $maxId = collect($events)->pluck('id')->max() ?: 0;
        $newId = $maxId + 1;

        $newEvent = [
            'id' => $newId,
            'foto' => $request->input('foto', 'img/event.png'),
            'judul' => $request->input('judul'),
            'kategori' => $request->input('kategori'),
            'lokasi' => $request->input('lokasi'),
            'tanggal' => $request->input('tanggal'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'alamat_lengkap' => $request->input('alamat_lengkap'),
        ];

        $events[] = $newEvent;
        $this->saveEventsToSession($events);

        return redirect()
            ->route('dashboard.events.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Show edit form for an event in dashboard.
     */
    public function edit(string $id)
    {
        $events = $this->getEventsFromSession();
        $event = collect($events)->firstWhere('id', (int)$id);

        if (!$event) {
            abort(404, 'Event tidak ditemukan.');
        }

        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update event stored in session.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|string|max:50',
            'harga' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'alamat_lengkap' => 'required|string|max:500',
        ]);

        $events = $this->getEventsFromSession();

        $updated = false;
        foreach ($events as &$evt) {
            if ((int)$evt['id'] === (int)$id) {
                $evt['foto'] = $request->input('foto', $evt['foto']);
                $evt['judul'] = $request->input('judul');
                $evt['kategori'] = $request->input('kategori');
                $evt['lokasi'] = $request->input('lokasi');
                $evt['tanggal'] = $request->input('tanggal');
                $evt['harga'] = $request->input('harga');
                $evt['deskripsi'] = $request->input('deskripsi');
                $evt['alamat_lengkap'] = $request->input('alamat_lengkap');
                $updated = true;
                break;
            }
        }

        if (!$updated) {
            abort(404, 'Event tidak ditemukan.');
        }

        $this->saveEventsToSession($events);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil diupdate');
    }

    /**
     * Delete an event from session.
     */
    public function destroy(string $id)
    {
        $events = $this->getEventsFromSession();
        $filtered = array_values(array_filter($events, function ($evt) use ($id) {
            return (int)$evt['id'] !== (int)$id;
        }));

        $this->saveEventsToSession($filtered);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil dihapus');
    }


}