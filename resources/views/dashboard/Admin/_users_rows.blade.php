@forelse ($users ?? [] as $index => $user)
    <tr class="hover:bg-gray-50 transition border-b border-gray-200">
        <td class="px-6 py-4 text-gray-600">{{ $index + 1 }}</td>
        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
        <td class="px-6 py-4 text-gray-600">{{ $user->phone ?? '-' }}</td>
        <td class="px-6 py-4 text-gray-600">
            {{ optional($user->date_of_birth)->format('d/m/Y') ?? '-' }}
        </td>
        
        <td class="px-6 py-4">
            @php
                $role = strtolower($user->role ?? 'user');
                $roleClass = $role === 'admin' 
                    ? 'bg-purple-100 text-purple-700' 
                    : 'bg-blue-100 text-blue-700';
            @endphp
            <span class="px-2 py-1 {{ $roleClass }} rounded-full text-[10px] font-bold uppercase">
                {{ $user->role ?? 'User' }}
            </span>
        </td>

        <td class="px-6 py-4 text-center">
            <div class="flex justify-center gap-3">
                <a href="{{ route('dashboard.users.edit', $user->id) }}"
                    class="text-blue-500 font-medium hover:underline">Edit</a>

                <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                    onsubmit="return confirm('Yakin hapus user ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-red-600 font-medium hover:underline">Delete</button>
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td class="px-6 py-8 text-center text-gray-500" colspan="7">
            <div class="flex flex-col items-center">
                <span class="text-sm">Tidak ada data pengguna.</span>
            </div>
        </td>
    </tr>
@endforelse