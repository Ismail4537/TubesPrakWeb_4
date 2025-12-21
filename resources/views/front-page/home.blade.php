<x-front-page.layout>
<x-slot:title> {{$title}} </x-slot:title>
    {{-- Banner Section --}}
    <div class="relative flex items-center justify-center h-[350px] rounded-[10px] bg-center bg-no-repeat bg-cover overflow-hidden" 
        style="background-image: url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop');">
        
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 text-center px-4">
            <h1 class="text-white font-bold text-[40px] leading-tight">
                Welcome to Our Event
            </h1>
            
            <p class="text-white text-[20px] mt-5">
                Join us for an unforgettable experience!
            </p>

            <div class="mt-8">
                <a href="{{ route('event.index') }}" class="relative z-10 inline-block bg-[#3B82F6] text-white font-bold py-2.5 px-5 rounded-[5px] no-underline transition-colors duration-300 ease-in-out hover:bg-blue-600">
                    Explore Events
                </a>
            </div>
        </div>
    </div>
    {{-- Top Picks Section--}}
    <div class="pt-10 pb-2 px-7 bg-white font-sans" x-data="{ activeTab: 'Sorotan' }">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Top Picks for You</h2>
        <div class="flex flex-wrap gap-3">
        
            <button 
                @click="activeTab = 'Sorotan'"
                :class="activeTab === 'Sorotan' ? 'border-blue-400 bg-blue-50 ring-2 ring-blue-100' : 'border-gray-300 bg-white hover:bg-gray-100 hover:border-gray-400 hover:-translate-y-0.5'"
                class="flex items-center gap-2 px-5 py-2 rounded-full border transition-all duration-200 shadow-sm focus:outline-none"
            >
                <span class="text-lg">🏆</span>
                <span class="font-medium text-sm text-gray-700">Sorotan</span>
            </button>

            <button 
                @click="activeTab = 'Populer'"
                :class="activeTab === 'Populer' ? 'border-blue-400 bg-blue-50 ring-2 ring-blue-100' : 'border-gray-300 bg-white hover:bg-gray-100 hover:border-gray-400 hover:-translate-y-0.5'"
                class="flex items-center gap-2 px-5 py-2 rounded-full border transition-all duration-200 shadow-sm focus:outline-none"
            >
                <span class="text-lg text-red-500">🔥</span>
                <span class="font-medium text-sm text-gray-700">Populer</span>
            </button>

            <button 
                @click="activeTab = 'Terbaru'"
                :class="activeTab === 'Terbaru' ? 'border-blue-400 bg-blue-50 ring-2 ring-blue-100' : 'border-gray-300 bg-white hover:bg-gray-100 hover:border-gray-400 hover:-translate-y-0.5'"
                class="flex items-center gap-2 px-5 py-2 rounded-full border transition-all duration-200 shadow-sm focus:outline-none"
            >
                <span class="text-lg text-yellow-500">✨</span>
                <span class="font-medium text-sm text-gray-700">Terbaru</span>
            </button>

            <button 
                @click="activeTab = 'Gratis'"
                :class="activeTab === 'Gratis' ? 'border-blue-400 bg-blue-50 ring-2 ring-blue-100' : 'border-gray-300 bg-white hover:bg-gray-100 hover:border-gray-400 hover:-translate-y-0.5'"
                class="flex items-center gap-2 px-5 py-2 rounded-full border transition-all duration-200 shadow-sm focus:outline-none"
            >
                <span class="inline-flex items-center justify-center w-6 h-6 bg-teal-500 text-white text-[10px] font-bold rounded-md uppercase">Free</span>
                <span class="font-medium text-sm text-gray-700">Gratis</span>
            </button>

        </div>
    </div>

    {{-- Event list --}}
    <div>
        {{-- Card Event --}}
        <div class="p-4 grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-4"> 
            <a href="#">
                <div class="border border-gray-300 w-full max-w-xs bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">    
                    {{-- Gambar --}}
                    <div class="relative h-32 sm:h-42"> 
                        <img src="{{ asset('../Image/Preview.jpg') }}" class="w-full h-full object-cover rounded-t-xl">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="px-4 py-5 pt-3 grow flex flex-col">
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">
                            event
                        </h2>
                        <div class="space-y-2 text-gray-600 text-sm">
                            {{-- Kategori --}}
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.008v.008H6V6z"></path></svg>
                                <span>jawaa</span>
                            </div>
                            {{-- Tanggal dan Waktu --}}
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>Jawa</span>
                            </div>
                            {{-- Lokasi Tempat/Alamat --}}
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Jawa</span>
                            </div>
                            {{-- Harga --}}
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                <span>Free</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>        
        </div>
        <a href="/event">
        <button class="mt-6 px-6 py-2 bg-white font-medium border border-gray-200 shadow-sm hover:bg-gray-100 rounded-lg block mx-auto">
            Load More Events
        </button>
        </a>
    </div>

    {{-- Creator --}}
        <hr class="my-12 border-2 border-gray-200 rounded">

    {{-- Creator --}}
    <div class="px-4 mb-10">
        <h1 class="text-2xl font-semibold text-gray-900 mb-4">Creator Pilihan</h1>
        <div class="px-2 grid grid-cols-[repeat(auto-fit,minmax(177px,1fr))]">
            {{-- Card Creator --}}
            <a href="#" class="my-4 shrink-0 w-48 ">
                <div class="p-2 flex flex-col items-center w-full max-w-xs rounded-xl overflow-hidden h-full">
                    <img src="{{ asset('../Image/Preview.jpg') }}" alt="gambar" class="w-35 h-35 rounded-full object-cover mb-4">
                    <h2 class="text-md font-medium text-gray-900 text-center">Nama Creator jawaaa apa adanya</h2>
                </div>
            </a>
        </div>
        <a href="#">
            <button class="mt-6 mx-auto block px-6 py-2 bg-white font-medium border border-gray-200 shadow-sm hover:bg-gray-100 rounded-lg">
                Load More Creator
            </button>
        </a>
    </div>
</x-front-page.layout>