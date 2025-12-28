@forelse ($categories as $index => $category)
    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
        <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
        <td class="px-6 py-4">{{ $category->name }}</td>
        <td class="px-6 py-4 text-center">
            <a href="{{ route('categories.edit', $category->id) }}" class="text-brand font-medium hover:underline mr-4">
                Update
            </a>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 font-medium hover:underline">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
            Data category tidak ditemukan
        </td>
    </tr>
@endforelse
