@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="max-w-lg mx-auto bg-neutral-primary-soft p-6 rounded-base shadow border border-default">

    <h2 class="text-lg font-semibold mb-4">Edit Event</h2>

    <form action="{{ route('dashboard.events.update', $event['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="foto" placeholder="URL foto" value="{{ old('foto', $event['foto'] ?? '') }}"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">

        <input type="text" name="judul" placeholder="Judul" value="{{ old('judul', $event['judul'] ?? '') }}"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">

        <input type="text" name="kategori" placeholder="Kategori"
            value="{{ old('kategori', $event['kategori'] ?? '') }}"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">

        <input type="text" name="lokasi" placeholder="Lokasi" value="{{ old('lokasi', $event['lokasi'] ?? '') }}"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">

        <input type="text" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal', $event['tanggal'] ?? '') }}"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">

        <input type="text" name="harga" placeholder="Harga" value="{{ old('harga', $event['harga'] ?? '') }}"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">

        <textarea name="deskripsi" placeholder="Deskripsi"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-2">{{ old('deskripsi', $event['deskripsi'] ?? '') }}</textarea>

        <textarea name="alamat_lengkap" placeholder="Alamat lengkap"
            class="w-full px-3 py-2 border border-default-medium rounded-base mb-4">{{ old('alamat_lengkap', $event['alamat_lengkap'] ?? '') }}</textarea>

        <div class="flex justify-end gap-2">
            <a href="{{ route('dashboard.events.index') }}" class="px-4 py-2 border rounded-base text-sm">Batal</a>
            <button type="submit"
                class="px-4 py-2 bg-brand text-black border rounded-base hover:bg-brand-dark text-sm">Update</button>
        </div>
    </form>

</div>
