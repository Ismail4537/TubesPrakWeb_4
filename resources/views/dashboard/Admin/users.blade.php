<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

        <div class="p-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="relative w-full max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input id="searchUsers" type="text" placeholder="Search"
                        class="block w-full ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs">
                </div>
            </div>

            <select id="filterRole"
                class="px-3 py-2 bg-neutral-secondary-medium border border-default-medium rounded-base text-sm">
                <option value="">Semua Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

        </div>

        <table class="w-full text-sm text-left text-body">
            <thead class="bg-neutral-secondary-medium border-b border-default-medium">
                <tr>
                    <th class="px-6 py-3 font-medium text-center">No</th>
                    <th class="px-6 py-3 font-medium">Nama</th>
                    <th class="px-6 py-3 font-medium">Email</th>
                    <th class="px-6 py-3 font-medium">Nomor Telepon</th>
                    <th class="px-6 py-3 font-medium">Tanggal Lahir</th>
                    <th class="px-6 py-3 font-medium">Profile Photo</th>
                    <th class="px-6 py-3 font-medium">Role</th>
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">


                @forelse($users ?? [] as $index => $user)
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->phone ?? '-' }}</td>
                        <td class="px-6 py-4">{{ optional($user->date_of_birth)->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $user->profile_photo_path ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $user->role ?? 'User' }}</td>

                        <!-- Aksi -->
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                class="text-brand font-medium hover:underline mr-4">Update</a>

                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                class="inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="flex justify-end items-center space-x-2 px-4 py-4">
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">&lt;</button>
            <button class="border px-3 py-1 rounded bg-neutral-secondary-medium">1</button>
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">2</button>
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">&gt;</button>
        </div>
    </div>

    @push('scripts')
        <script>
            (function() {
                function debounce(fn, delay = 300) {
                    let t;
                    return (...args) => {
                        clearTimeout(t);
                        t = setTimeout(() => fn(...args), delay);
                    };
                }

                const input = document.getElementById('searchUsers');
                const roleSelect = document.getElementById('filterRole');
                const tbody = document.getElementById('usersTableBody');
                const url = "{{ route('dashboard.users.search') }}";

                if (!input || !tbody) return;

                const fetchData = debounce(async () => {
                    const q = input.value.trim();
                    const role = roleSelect ? roleSelect.value : '';

                    const params = new URLSearchParams({
                        q: q,
                        role: role
                    });

                    try {
                        const res = await fetch(`${url}?${params.toString()}`);
                        const data = await res.json();
                        tbody.innerHTML = data.html;
                    } catch (e) {
                        tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="text-center text-red-500 py-4">
                        Gagal memuat data
                    </td>
                </tr>`;
                    }
                });

                input.addEventListener('input', fetchData);
                if (roleSelect) roleSelect.addEventListener('change', fetchData);
            })();
        </script>
    @endpush

</x-back-page.layout>
