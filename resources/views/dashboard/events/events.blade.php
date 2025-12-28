<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
            <div class="flex flex-1 items-center gap-2 max-w-2xl">
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input id="searchEvent" type="text" placeholder="Cari event..."
                        class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none text-sm shadow-sm" />
                </div>

                <div class="shrink-0">
                    <select id="filterCategory" class="block w-full ...">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <a href="{{ route('dashboard.events.create') }}"
                class="shrink-0 flex items-center gap-2 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-400 transition shadow-sm text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="hidden sm:inline">Buat Event</span>
                <span class="sm:hidden">Buat</span>
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Judul Event</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Kategori</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="eventTableBody" class="divide-y divide-gray-200 text-sm">
                        @forelse ($listevent ?? [] as $index => $event)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $event['title'] ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $event['category']['name'] ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $status = strtolower($event['status'] ?? 'draft');
                                        $statusClasses = [
                                            'scheduled' => 'bg-blue-100 text-blue-700',
                                            'ongoing' => 'bg-green-100 text-green-700',
                                            'completed' => 'bg-yellow-100 text-yellow-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                        ];
                                        $currentClass = $statusClasses[$status] ?? 'bg-blue-100 text-blue-700';
                                    @endphp
                                    <span
                                        class="px-2 py-1 {{ $currentClass }} rounded-full text-[10px] font-bold uppercase">
                                        {{ $event['status'] ?? 'Draft' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('dashboard.events.edit', $event->id) }}"
                                            class="text-blue-500 font-medium hover:underline">Edit</a>

                                        <form action="{{ route('dashboard.events.destroy', $event->id) }}"
                                            method="POST" onsubmit="return confirm('Hapus event ini?')">
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
                                <td class="px-6 py-8 text-center text-gray-500" colspan="5">
                                    <div class="flex flex-col items-center">
                                        <span class="text-sm">Tidak ada event ditemukan.</span>
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
                            class="font-medium">{{ count($listevent ?? []) }}</span> hasil
                    </p>
                </div>

                @if ($listevent->hasPages())
                    <div class="flex flex-1 justify-between sm:justify-end gap-2">
                        @if ($listevent->onFirstPage())
                            <button
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Previous
                            </button>
                        @else
                            <a href="{{ $listevent->previousPageUrl() }}"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Previous
                            </a>
                        @endif
                        <div class="hidden md:flex gap-1">
                            @foreach ($listevent->getUrlRange(1, $listevent->lastPage()) as $page => $url)
                                @if ($page == $listevent->currentPage())
                                    <a href="{{ $url }}"
                                        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg">{{ $page }}</a>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">{{ $page }}</a>
                                @endif
                            @endforeach
                        </div>
                        @if ($listevent->hasMorePages())
                            <a href="{{ $listevent->nextPageUrl() }}"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Next
                            </a>
                        @else
                            <button
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
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
                const searchInput = document.getElementById('searchEvent');
                const categorySelect = document.getElementById('filterCategory');
                const tableBody = document.getElementById('eventTableBody');
                const fetchUrl = "{{ route('dashboard.events.search') }}";

                let debounceTimer;

                function debounceSearch() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(fetchData, 300);
                }

                async function fetchData() {
                    const q = searchInput.value.trim();
                    const category = categorySelect.value;

                    const params = new URLSearchParams({
                        q,
                        category
                    });

                    try {
                        const res = await fetch(`${fetchUrl}?${params}`);
                        const data = await res.json();
                        tableBody.innerHTML = data.html;
                    } catch (e) {
                        tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="px-6 py-6 text-center text-red-500">
                        Gagal memuat data
                    </td>
                </tr>
            `;
                    }
                }

                searchInput.addEventListener('input', debounceSearch);
                categorySelect.addEventListener('change', fetchData);
            })();
        </script>
    @endpush

</x-back-page.layout>
