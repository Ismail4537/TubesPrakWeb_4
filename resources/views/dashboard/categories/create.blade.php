<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama kategori" class="border p-2 rounded w-full mb-4">

    <button type="submit" class="px-4 py-2 bg-brand text-white rounded">
        Simpan
    </button>
</form>
