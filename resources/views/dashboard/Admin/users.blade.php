<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="max-w-6xl mx-auto">
        {{-- Header: Search & Filter --}}
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
            <div class="flex flex-1 items-center gap-2 max-w-2xl">
                {{-- Search Bar --}}
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input id="searchUsers" type="text" placeholder="Cari user..."
                        class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none text-sm shadow-sm" />
                </div>

                <div class="shrink-0">
                    <select id="filterRole"
                        class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none text-sm shadow-sm">
                        <option value="">Semua Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>

            {{-- <div class="shrink-0"></div> --}}
        </div>

        {{-- Table Container --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">No. Telp</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Tgl Lahir</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody" class="divide-y divide-gray-200 text-sm">
                        @forelse ($users ?? [] as $index => $user)
                            <tr class="hover:bg-gray-50 transition">
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
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="hidden sm:flex flex-1 items-center">
                    <p class="text-sm text-gray-600">
                        Menampilkan <span class="font-medium">1</span> sampai <span
                            class="font-medium">{{ count($users ?? []) }}</span> hasil
                    </p>
                </div>

                @if($users->hasPages())
                <div class="flex flex-1 justify-between sm:justify-end gap-2">
                    @if($users->onFirstPage())
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </button>
                    @else
                    <a href="{{ $users->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </a>
                    @endif

                    <div class="hidden md:flex gap-1">
                        @foreach($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            @if($page == $users->currentPage())
                                <span class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">{{ $page }}</a>
                            @endif
                        @endforeach
                    </div>

                    @if($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Next
                    </a>
                    @else
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Next
                    </button>
                    @endif
                </div>
                @endif
            </div>
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
                                <td colspan="7" class="px-6 py-6 text-center text-red-500">
                                    Gagal memuat data
                                </td>
                            </tr>
                        `;
                    }
                });

                input.addEventListener('input', fetchData);
                if (roleSelect) roleSelect.addEventListener('change', fetchData);
            })();
        </script>
    @endpush
</x-back-page.layout>