@vite(['resources/css/app.css', 'resources/js/app.js'])

<h2 class="text-xl font-semibold mb-4">Buat Event</h2>

<form action="{{ route('dashboard.events.store') }}" method="POST">
    @csrf

    <input type="text" name="foto" placeholder="URL foto" value="{{ old('foto') }}"
        class="border p-2 rounded w-full mb-2">
    <input type="text" name="judul" placeholder="Judul" value="{{ old('judul') }}"
        class="border p-2 rounded w-full mb-2">
    <input type="text" name="kategori" placeholder="Kategori" value="{{ old('kategori') }}"
        class="border p-2 rounded w-full mb-2">
    <input type="text" name="lokasi" placeholder="Lokasi" value="{{ old('lokasi') }}"
        class="border p-2 rounded w-full mb-2">
    <input type="text" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}"
        class="border p-2 rounded w-full mb-2">
    <input type="text" name="harga" placeholder="Harga" value="{{ old('harga') }}"
        class="border p-2 rounded w-full mb-2">
    <textarea name="deskripsi" placeholder="Deskripsi" class="border p-2 rounded w-full mb-2">{{ old('deskripsi') }}</textarea>
    <textarea name="alamat_lengkap" placeholder="Alamat lengkap" class="border p-2 rounded w-full mb-4">{{ old('alamat_lengkap') }}</textarea>

    <button type="submit" class="px-4 py-2 bg-brand text-black rounded">Simpan</button>
</form>
