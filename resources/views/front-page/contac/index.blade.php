<x-front-page.layout>
<x-slot:title> {{$title}} </x-slot:title>
        <div class="flex flex-col md:flex-row md:items-center mb-6 space-y-4 space-x-4 md:space-y-0">
            <h1 class="text-3xl font-bold text-gray-800">
                List Contacts
            </h1>

            <div class="w-full md:w-1/3">
                <form action="{{ route('event.index') }}" method="GET" class="relative">
                    <input type="text" name="search" placeholder="Cari Event, Lokasi, atau Kategori..." class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </form>
            </div>
        </div>
    <div class="p-4 grid grid-cols-2 gap-2 justify-items-center md:grid-cols-3 lg:grid-cols-5 lg:gap-6.5">
        @foreach ($listContact as $contact)
        <a href="{{ route('contac.show', ['id' => $contact['id']]) }}">
            <div class="border border-gray-300 w-full max-w-xs bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">    

                {{-- Gambar --}}
                <div class="relative h-32 sm:h-42"> 
                    <img src=
                    @if ($contact['profile_photo_path'] != null)
                        {{ asset('storage/' . $contact->profile_photo_path) }}
                    @else
                        "https://ui-avatars.com/api/?name={{ urlencode($contact->name ?? 'User') }}&background=random&color=fff&size=128"
                    @endif
                    alt="{{ $contact['name'] }}" class="w-full h-full object-cover rounded-t-xl">
                </div>

                {{-- Deskripsi --}}
                <div class="px-4 pt-3 grow flex flex-col">
                    <h2 align="center" class="font-semibold text-gray-900 mb-3">
                        {{ $contact['name'] }}
                    </h2>
                </div>
            </div>
        </a>
        @endforeach
    </div>
{{-- pagination --}}
@if($listContact->hasPages())
    <div class="px-6 py-4 border-t border-gray-208">
        <nav aria-label="Page navigation">
            <ul class="flex-space-x-px text-sm">
                {{-- Previous Button --}}
                @if($listContact->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-18">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $listContact->previousPageUrl() }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-s-base text-sm px-3 h-18 focus:outline-none">Previous</a>
                    </li>
                @endif
                {{-- Page Numbers --}}
                @foreach($listContact->getUrlRange (1, $listContact->lastPage()) as $page => $url)
                    @if($page == $listContact->currentPage())
                        <li>
                            <a href="{{ $url}}" aria-current="page" class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover: text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium text-sm w-18 h-18 focus: outline-none"> {{ $page }}</a>
                        </li>
                    @endif
                @endforeach
                {{-- Next Button --}}
                @if($listContact->hasMorePages())
                    <li>
                        <a href="{{ $listContact->nextPageUrl() }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-e-base text-sm px-3 h-18 focus:outline-none">Next</a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-16">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
</x-front-page.layout>