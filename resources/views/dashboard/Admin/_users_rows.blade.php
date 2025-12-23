@forelse($users as $index => $user)
    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
        <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
        <td class="px-6 py-4">{{ $user->name }}</td>
        <td class="px-6 py-4">{{ $user->email }}</td>
        <td class="px-6 py-4">{{ $user->phone ?? '-' }}</td>
        <td class="px-6 py-4">
            {{ $user->date_of_birth ? $user->date_of_birth->format('d/m/Y') : '-' }}
        </td>
        <td class="px-6 py-4">{{ $user->profile_photo_path ?? '-' }}</td>
        <td class="px-6 py-4">{{ $user->role ?? 'User' }}</td>
        <td class="px-6 py-4 text-center">
            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="text-brand font-medium hover:underline mr-4">
                Update
            </a>

            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="inline"
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
        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
            Tidak ada data pengguna.
        </td>
    </tr>
@endforelse
