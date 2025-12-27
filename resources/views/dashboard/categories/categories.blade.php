<x-back-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="max-w-6xl mx-auto">
        {{-- Header: Search & Create --}}
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
                    <input id="searchCategory" type="text" placeholder="Search..."
                        class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none text-sm shadow-sm" />
                </div>
            </div>

            {{-- Create Button --}}
            <a href="{{ route('dashboard.categories.create') }}"
                class="shrink-0 flex items-center gap-2 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-400 transition shadow-sm text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="hidden sm:inline">Create</span>
                <span class="sm:hidden">Add</span>
            </a>
        </div>

        {{-- Table Container --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="categoriesTableBody" class="divide-y divide-gray-200 text-sm">
                        {{-- INCLUDE PARTIAL --}}
                        @include('dashboard.categories._categories_rows')
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-between px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="hidden sm:flex flex-1 items-center">
                    <p class="text-sm text-gray-600">
                        Menampilkan <span class="font-medium">{{ $categories->firstItem() ?? 0 }}</span> sampai 
                        <span class="font-medium">{{ $categories->lastItem() ?? 0 }}</span> dari 
                        <span class="font-medium">{{ $categories->total() ?? 0 }}</span> hasil
                    </p>
                </div>

                @if($categories->hasPages())
                <div class="flex flex-1 justify-between sm:justify-end gap-2">
                    @if($categories->onFirstPage())
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition" disabled>
                        Previous
                    </button>
                    @else
                    <a href="{{ $categories->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </a>
                    @endif

                    <div class="hidden md:flex gap-1">
                        @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            @if($page == $categories->currentPage())
                                <span class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">{{ $page }}</a>
                            @endif
                        @endforeach
                    </div>

                    @if($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Next
                    </a>
                    @else
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition" disabled>
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
                const searchInput = document.getElementById('searchCategory');
                const tableBody = document.getElementById('categoriesTableBody');
                const fetchUrl = "{{ route('dashboard.categories.search') }}";

                let debounceTimer;

                function debounceSearch() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(fetchData, 300);
                }

                async function fetchData() {
                    const q = searchInput.value.trim();
                    const params = new URLSearchParams({ q });

                    try {
                        const res = await fetch(`${fetchUrl}?${params}`);
                        const data = await res.json();
                        tableBody.innerHTML = data.html;
                    } catch (e) {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="3" class="px-6 py-6 text-center text-red-500">
                                    Gagal memuat data
                                </td>
                            </tr>
                        `;
                    }
                }

                if(searchInput) {
                    searchInput.addEventListener('input', debounceSearch);
                }
            })();
        </script>
    @endpush
</x-back-page.layout>