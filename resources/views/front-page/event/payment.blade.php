<x-front-page.layout>
    <x-slot:title> Payment {{ $event['title'] }} </x-slot:title>

    <div class="min-h-screen py-12 px-4">
        <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-black/10 overflow-hidden shadow-2xl">
                    <div class="p-6 border-b border-black/10">
                        <h2 class="text-xl font-bold text-[#1C1E23]">Detail Tiket</h2>
                    </div>
                    <div class="p-6 flex flex-col md:flex-row gap-6">
                        <div class="w-full md:w-56 h-36 bg-gray-800 rounded-xl overflow-hidden border border-black/5">
                            <img src="{{ $event['image_path'] ? asset('storage/' . $event['image_path']) : asset('Image/Preview.jpg') }}" 
                                 class="w-full h-full object-cover" 
                                 alt="{{ $event['title'] }}">
                        </div>
                        <div class="flex-1 space-y-3">
                            <span class="px-3 py-1 inline-block bg-gray-200 text-gray-700 text-sm rounded-full">
                                {{ $event->category->name }}
                            </span>
                            <h3 class="text-2xl font-bold text-[#1C1E23] leading-tight">{{ $event['title'] }}</h3>
                            <div class="grid grid-cols-1 gap-2 text-sm text-gray-400">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($event['start_date_time'])->format('d M Y, H:i') }}
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    {{ $event['location'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-black/10 p-6 shadow-2xl">
                    <h2 class="text-xl font-bold text-[#1C1E23] mb-6">Pilih Metode Pembayaran</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        

                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-black/10 p-6 sticky top-8 shadow-2xl">
                    <h2 class="text-xl font-bold text-[#1C1E23] mb-6">Rincian Pembayaran</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-gray-400">
                            <span>Harga Tiket (1x)</span>
                            <span class="text-[#1C1E23] font-medium">{{ $event['price'] == 0 ? 'Free' : 'Rp ' . number_format($event['price'], 0, ',', '.') }}</span>
                        </div>
                        
                        @if($event['price'] !== 0)
                        <div class="flex justify-between pt-2 border-t border-black/10">
                            <span class="text-lg font-bold text-[#1C1E23]">Total Bayar</span>
                            <span class="text-xl font-black text-blue-400">{{ 'Rp ' . number_format($event['price'], 0, ',', '.') }}</span>
                        </div>
                        @else
                        <div class="flex justify-between pt-2 border-t border-black/10">
                            <span class="text-lg font-bold text-[#1C1E23]">Total Bayar</span>
                            <span class="text-xl font-black text-green-400 uppercase">Gratis</span>
                        </div>
                        @endif
                    </div>

                    <div class="space-y-3">
                        <form action="{{ route('event.payment.process', $event['slug']) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-blue-600/20 active:scale-95 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                {{ $event['price'] == 0 ? 'Daftar Sekarang' : 'Konfirmasi & Bayar' }}
                            </button>
                        </form>
                        <p class="text-[10px] text-gray-500 text-center leading-relaxed">
                            Pesanan Anda diproses dengan aman. Dengan mengklik tombol di atas, Anda menyetujui Ketentuan Layanan kami.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-front-page.layout>