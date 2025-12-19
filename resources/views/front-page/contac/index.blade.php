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
                    @if ($contact['image_path'] != null)
                        <img src="{{ $contact['image_path'] }}" alt="{{ $contact['name'] }}" class="w-full h-full object-cover rounded-t-xl">
                    @else
                        <img src="{{ asset('Image/Preview.jpg') }}" alt="{{ $contact['name'] }}" class="w-full h-full object-cover rounded-t-xl">
                    @endif
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
</x-front-page.layout>