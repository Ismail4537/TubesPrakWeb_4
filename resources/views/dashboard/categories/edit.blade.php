
<div class="max-w-lg mx-auto bg-neutral-primary-soft p-6 rounded-base shadow border border-default">

    <h2 class="text-lg font-semibold mb-4">Update Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Category</label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $category->name) }}"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand"
                required
            >

            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-2">
            <a href="{{ route('categories.index') }}"
               class="px-4 py-2 border rounded-base text-sm">
                Batal
            </a>

            <button
                type="submit"
                class="px-4 py-2 bg-brand text-black rounded-base hover:bg-brand-dark text-sm">
                Update
            </button>
        </div>
    </form>

</div>
