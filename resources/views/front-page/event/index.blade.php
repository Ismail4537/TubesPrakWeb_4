<x-front-page.layout>
<x-slot:title> {{$title}} </x-slot:title>

        
        <div class="flex flex-col md:flex-row md:items-center mb-6 space-y-4 space-x-4 md:space-y-0">
            <h1 class="text-3xl font-bold text-gray-800">
                List Event
            </h1>

            <div class="w-full md:w-1/3">
                <form action="{{ route('event.index') }}" method="GET" class="relative">
                    <input type="text" name="search" placeholder="Cari Event, Lokasi, atau Kategori..." class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </form>
            </div>
        </div>

    <div class="p-4 grid grid-cols-2 gap-4 justify-items-center md:grid-cols-3 lg:grid-cols-4 lg:gap-6.5"> 
        @foreach ($listevent as $event)
        <a href="{{ route('event.show', ['slug' => $event['slug']]) }}">
        <div class="border border-gray-300 w-full max-w-xs bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">    
            {{-- Gambar --}}
            <div class="relative h-32 sm:h-42"> 
                <img src="{{ $event['foto'] }}" alt="{{ $event['judul'] }}" class="w-full h-full object-cover rounded-t-xl">
            </div>

            {{-- Deskripsi --}}
            <div class="px-4 py-5 pt-3 grow flex flex-col">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ $event['judul'] }}
                </h2>
                <div class="space-y-2 text-gray-600 text-sm">
                    {{-- Kategori --}}
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.008v.008H6V6z"></path></svg>
                        <span>{{ $event['kategori'] }}</span>
                    </div>
                    {{-- Tanggal dan Waktu --}}
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>{{ $event['tanggal'] }}</span>
                    </div>
                    {{-- Lokasi Tempat/Alamat --}}
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{{ $event['lokasi'] }}</span>
                    </div>
                    {{-- Harga --}}
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        <span>{{ $event['harga'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        </a>
        @endforeach
    </div>
</x-front-page.layout>