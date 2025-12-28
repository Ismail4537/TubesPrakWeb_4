<x-front-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>


    <div class="flex flex-col md:flex-row md:items-center mb-6 space-y-4 space-x-4 md:space-y-0">
        <h1 class="text-3xl font-bold text-gray-800">
            List Event
        </h1>

        <div class="w-full md:w-1/3">
            <form action="{{ route('event.index') }}" method="GET" class="relative" id="event-search-form">
                <input id="search" type="text" name="search" placeholder="Cari Event, Lokasi, atau Kategori..."
                    class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('search') }}">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <select name="filter" id="filter"
                    class="absolute right-0 top-0 h-full py-2 pr-3 border-l border-gray-300 bg-gray-100 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option align="center" value="title">Title</option>
                    <option align="center" value="location">Location</option>
                </select>
            </form>
        </div>

        <select name="category" id="category"
            class="right-0 top-0 h-full py-2 pr-3 border-l border-gray-300 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option align="center" value="">Kategori</option>
            @foreach ($categories as $category)
                <option align="center" value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="when" id="when"
            class="right-0 top-0 h-full py-2 pr-3 border-l border-gray-300 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option align="center" value="">Semua</option>
            <option align="center" value="upcoming">Akan datang</option>
            <option align="center" value="past">Sudah lewat</option>
        </select>
    </div>
    <div id="event-grid" class="p-4 grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-4">
        @include('front-page.event.partials.cards', ['events' => $listevent])
    </div>
    {{-- pagination --}}
    <div id="pagination">
        @include('front-page.event.partials.pagination', ['paginator' => $listevent])
    </div>

    <script>
        (function() {
            const searchInput = document.getElementById('search');
            const filterSelect = document.getElementById('filter');
            const categorySelect = document.getElementById('category');
            const whenSelect = document.getElementById('when');
            const grid = document.getElementById('event-grid');
            const pagination = document.getElementById('pagination');
            const form = document.getElementById('event-search-form');

            if (!searchInput || !filterSelect || !categorySelect) return;

            let timer;
            const debounce = (fn, delay = 300) => {
                clearTimeout(timer);
                timer = setTimeout(fn, delay);
            };

            const fetchResults = (page = null) => {
                const params = new URLSearchParams();
                if (searchInput.value) params.set('q', searchInput.value);
                if (filterSelect.value) params.set('filter', filterSelect.value);
                if (categorySelect.value) params.set('category', categorySelect.value);
                if (whenSelect && whenSelect.value) params.set('when', whenSelect.value);
                if (page) params.set('page', page);

                fetch(`{{ route('event.search') }}?` + params.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        grid.innerHTML = data.html;
                        if (pagination) pagination.innerHTML = data.pagination || '';
                    })
                    .catch(() => {});
            };

            ['input', 'change'].forEach(evt => {
                searchInput.addEventListener(evt, () => debounce(fetchResults));
            });
            filterSelect.addEventListener('change', fetchResults);
            categorySelect.addEventListener('change', fetchResults);
            if (whenSelect) whenSelect.addEventListener('change', fetchResults);

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                fetchResults(1);
            });

            if (pagination) {
                pagination.addEventListener('click', (e) => {
                    const a = e.target.closest('a');
                    if (!a) return;
                    const url = new URL(a.href, window.location.origin);
                    const pageParam = url.searchParams.get('page') || null;
                    if (pageParam) {
                        e.preventDefault();
                        fetchResults(pageParam);
                    }
                });
            }
        })();
    </script>
</x-front-page.layout>
