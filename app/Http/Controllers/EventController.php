<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Pindahkan data ke properti agar dapat diakses oleh method lain
    private $events = [
        [
            'id' => 1,
            'foto' => 'img/event.png',
            'judul' => 'The Nutcracker in Ballet',
            'kategori' => 'Seni & Hiburan',
            'lokasi' => 'Ciputra Artpreneur',
            'tanggal' => '21 Des \'25 • 17.00 WIB',
            'harga' => 'IDR 225K',
            'deskripsi' => 'Pertunjukan balet klasik Natal yang memukau, dipersembahkan oleh Indonesia Dance Company di panggung megah Ciputra Artpreneur. Sebuah pengalaman ajaib untuk seluruh keluarga.',
            'alamat_lengkap' => 'Ciputra World 1, Lt. 10 Retail Podium, Jl. Professor Doktor Satrio Kav. 3-5, Setiabudi, Jakarta Selatan, Jakarta, Indonesia', // ALAMAT LENGKAP DITAMBAHKAN
        ],
        [
            'id' => 2,
            'foto' => 'img/event.png',
            'judul' => 'Konser Amal Musim Semi',
            'kategori' => 'Seni & Hiburan',
            'lokasi' => 'Balai Sarbini',
            'tanggal' => '15 Jan \'26 • 19.30 WIB',
            'harga' => 'IDR 150K',
            'deskripsi' => 'Konser orkestra yang menampilkan karya-karya klasik dan kontemporer untuk menggalang dana amal. Nikmati melodi indah sambil berdonasi.',
            'alamat_lengkap' => 'Plaza Semanggi, Lantai Dasar, Jl. Jend. Sudirman Kav. 50, Karet Semanggi, Jakarta Selatan',
        ],
        [
            'id' => 3,
            'foto' => 'img/event.png',
            'judul' => 'Pameran Seni Kontemporer',
            'kategori' => 'Seni & Hiburan',
            'lokasi' => 'Jakarta Pusat',
            'tanggal' => '05 Feb \'26 • 10.00 WIB',
            'harga' => 'Free',
            'deskripsi' => 'Pameran karya-karya seni rupa modern dari seniman muda Indonesia. Tiket masuk gratis untuk umum.',
            'alamat_lengkap' => 'Jl. Medan Merdeka Timur No.14, Gambir, Jakarta Pusat',
        ],
        [
            'id' => 4,
            'foto' => 'img/event.png',
            'judul' => 'Startup Summit 2026',
            'kategori' => 'Technology & Business',
            'lokasi' => 'Senayan',
            'tanggal' => '28 Mar \'26 • 09.00 WIB',
            'harga' => 'IDR 500K',
            'deskripsi' => 'Konferensi teknologi dan bisnis terbesar, menghadirkan para pemimpin industri, investor, dan inovator startup.',
            'alamat_lengkap' => 'Jl. Jenderal Gatot Subroto No.1, Senayan, Jakarta Pusat',
        ],
        [
            'id' => 5,
            'foto' => 'img/event.png',
            'judul' => 'Festival Kuliner Nusantara',
            'kategori' => 'Food & Beverage',
            'lokasi' => 'Jakarta',
            'tanggal' => '10 Apr \'26 • 11.00 WIB',
            'harga' => 'IDR 50K',
            'deskripsi' => 'Jelajahi keanekaragaman rasa Indonesia. Festival kuliner yang menyajikan makanan dan minuman khas dari berbagai daerah.',
            'alamat_lengkap' => 'Area Parkir Timur Gelora Bung Karno, Senayan, Jakarta Pusat',
        ],
        [
            'id' => 6,
            'foto' => 'img/event.png',
            'judul' => 'Running Marathon Jakarta',
            'kategori' => 'Olahraga',
            'lokasi' => 'Monas',
            'tanggal' => '01 Mei \'26 • 05.00 WIB',
            'harga' => 'IDR 300K',
            'deskripsi' => 'Ajang lari marathon tahunan dengan rute ikonik di jantung kota Jakarta. Tersedia kategori 5K, 10K, dan Full Marathon.',
            'alamat_lengkap' => 'Jl. Medan Merdeka Utara, Gambir, Jakarta Pusat (Titik Kumpul)',
        ],
        [
            'id' => 7,
            'foto' => 'img/event.png',
            'judul' => 'Workshop Digital Marketing',
            'kategori' => 'Technology & Business',
            'lokasi' => 'Bandung',
            'tanggal' => '17 Jun \'26 • 14.00 WIB',
            'harga' => 'IDR 100K',
            'deskripsi' => 'Pelatihan intensif tentang strategi pemasaran digital, SEO, dan iklan media sosial. Cocok untuk pelaku UMKM dan profesional.',
            'alamat_lengkap' => 'Jl. Ir. H. Juanda No. 120, Dago, Bandung, Jawa Barat',
        ],
        [
            'id' => 8,
            'foto' => 'img/event.png',
            'judul' => 'Stand Up Comedy Night',
            'kategori' => 'Seni & Hiburan',
            'lokasi' => 'SCBD',
            'tanggal' => '03 Jul \'26 • 20.00 WIB',
            'harga' => 'IDR 75K',
            'deskripsi' => 'Malam tawa bersama komika-komika ternama. Hiburan ringan di tengah hiruk pikuk kota.',
            'alamat_lengkap' => 'The Foundry No.8, SCBD Area Lot 8, Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan',
        ],
        [
            'id' => 9,
            'foto' => 'img/event.png',
            'judul' => 'Bazaar Buku Murah',
            'kategori' => 'Edukasi & Literasi',
            'lokasi' => 'Jakarta',
            'tanggal' => '14 Agu \'26 • 09.00 WIB',
            'harga' => 'Free',
            'deskripsi' => 'Ribuan judul buku baru dan bekas dengan harga terjangkau. Surga bagi pecinta literasi.',
            'alamat_lengkap' => 'Jl. Pintu Satu Senayan, Gelora, Tanah Abang, Jakarta Pusat',
        ],
        [
            'id' => 10,
            'foto' => 'img/event.png',
            'judul' => 'Seminar Investasi Properti',
            'kategori' => 'Technology & Business',
            'lokasi' => 'Jakarta Pusat',
            'tanggal' => '09 Sep \'26 • 13.00 WIB',
            'harga' => 'IDR 450K',
            'deskripsi' => 'Pelajari strategi investasi properti dari para ahli. Cocok untuk investor pemula hingga berpengalaman.',
            'alamat_lengkap' => 'Jl. M.H. Thamrin No.1, Menteng, Jakarta Pusat',
        ],
        [
            'id' => 11,
            'foto' => 'img/event.png',
            'judul' => 'Konser Jazz Internasional',
            'kategori' => 'Seni & Hiburan',
            'lokasi' => 'Jakarta Utara',
            'tanggal' => '20 Okt \'26 • 18.00 WIB',
            'harga' => 'IDR 900K',
            'deskripsi' => 'Festival musik jazz yang menampilkan musisi internasional dan lokal. Pengalaman akustik yang tak terlupakan.',
            'alamat_lengkap' => 'Jl. H. Benyamin Sueb No.28, Pademangan Timur, Jakarta Utara',
        ],
        [
            'id' => 12,
            'foto' => 'img/event.png',
            'judul' => 'Pesta Akhir Tahun',
            'kategori' => 'Seni & Hiburan',
            'lokasi' => 'Pantai Indah Kapuk',
            'tanggal' => '31 Des \'26 • 22.00 WIB',
            'harga' => 'IDR 250K',
            'deskripsi' => 'Rayakan malam tahun baru dengan pesta meriah, kembang api, dan DJ ternama di tepi laut.',
            'alamat_lengkap' => 'Jl. Pantai Indah Kapuk, Penjaringan, Jakarta Utara',
        ],
    ];

   // Method untuk menambahkan Slug dan Asset
    private function prepareEventData($event) 
    {
        // 1. Tambahkan Slug berdasarkan Judul
        $event['slug'] = Str::slug($event['judul']);
        // 2. Tambahkan Asset ke Foto
        $event['foto'] = asset($event['foto']);
        return $event;
    }

    public function index()
    {
        // Panggil prepareEventData untuk setiap item
        $listevent = array_map([$this, 'prepareEventData'], $this->events);

        return view('front-page.event.index', compact('listevent'), ['title' => 'List Event']);
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
}