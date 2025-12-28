<x-front-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>
    <div class="flex flex-col md:flex-row md:items-center mb-6 space-y-4 space-x-4 md:space-y-0">
        <h1 class="text-3xl font-bold text-gray-800">
            List Contacts
        </h1>

        <div class="w-full md:w-1/3">
            <form action="{{ route('contac') }}" method="GET" class="relative" id="contac-search-form">
                <input id="search-contact" type="text" name="search" placeholder="Cari kontak (nama atau email)"
                    class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('search') }}">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>
    </div>
    <div id="contac-grid"
        class="p-4 grid grid-cols-2 gap-2 justify-items-center md:grid-cols-3 lg:grid-cols-5 lg:gap-6.5">
        @include('front-page.contac.partials.cards', ['contacts' => $listContact])
    </div>
    {{-- pagination --}}
    <div id="contac-pagination">
        @include('front-page.event.partials.pagination', ['paginator' => $listContact])
    </div>

    <script>
        (function() {
            const input = document.getElementById('search-contact');
            const grid = document.getElementById('contac-grid');
            const pagination = document.getElementById('contac-pagination');
            const form = document.getElementById('contac-search-form');

            if (!input || !grid || !pagination || !form) return;

            let timer;
            const debounce = (fn, delay = 300) => {
                clearTimeout(timer);
                timer = setTimeout(fn, delay);
            };

            const fetchResults = (page = null) => {
                const params = new URLSearchParams();
                if (input.value) params.set('q', input.value);
                if (page) params.set('page', page);

                fetch(`{{ route('contac.search') }}?` + params.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        grid.innerHTML = data.html;
                        pagination.innerHTML = data.pagination || '';
                    })
                    .catch(() => {});
            };

            input.addEventListener('input', () => debounce(fetchResults));
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                fetchResults(1);
            });

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
        })();
    </script>
</x-front-page.layout>
