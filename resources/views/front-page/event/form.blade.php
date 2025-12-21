<x-front-page.layout>
    
    <x-slot:title>{{ isset($event) ? 'Edit Event' : 'Buat Event Baru' }}</x-slot:title>

    <div class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-xl rounded-2xl border border-gray-200 overflow-hidden">

                <div class="bg-white px-8 py-6 border-b border-gray-100 text-center">
                    <h3 class="text-2xl font-extrabold text-gray-800">
                        {{ isset($event) ? 'Edit Event' : 'Buat Event' }}
                    </h3>
                    <p class="text-gray-500 mt-1 text-sm">
                        {{ isset($event) ? 'Perbarui detail event kamu.' : 'Isi detail event seru kamu di sini!' }}
                    </p>
                </div>

                
                <form action="{{ isset($event) ? '#' : '#' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    
                    @if(isset($event))
                        @method('PUT')
                    @endif
                    
                    <div class="p-8 space-y-6">

                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Event</label>
                            {{-- 
                                value="{{ $event->title ?? '' }}"
                            --}}
                            <input type="text" name="title" value="{{ $event->title ?? '' }}" placeholder="Contoh: Konser Musik Galau Fest"
                                   class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi Event</label>
                            <input type="text" name="location" value="{{ $event->location ?? '' }}" placeholder="Contoh: ICE BSD, Tangerang"
                                   class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                        </div>

                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Waktu Mulai</label>
                                <input type="datetime-local" name="start_time" value="{{ $event->start_time ?? '' }}"
                                       class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Waktu Selesai</label>
                                <input type="datetime-local" name="end_time" value="{{ $event->end_time ?? '' }}"
                                       class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium text-sm">
                            </div>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kategori Event</label>
                            <select name="category" class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium bg-white">
                                <option value="" disabled {{ !isset($event) ? 'selected' : '' }}>Pilih Kategori...</option>
                                {{-- Contoh Logika Selected untuk Edit --}}
                                <option value="music" {{ (isset($event) && $event->category == 'music') ? 'selected' : '' }}>Musik / Konser</option>
                                <option value="sports" {{ (isset($event) && $event->category == 'sports') ? 'selected' : '' }}>Olahraga</option>
                                <option value="festival" {{ (isset($event) && $event->category == 'festival') ? 'selected' : '' }}>Festival</option>
                            </select>
                        </div>

                    
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Harga Tiket (IDR)</label>
                            <input type="number" name="price" value="{{ $event->price ?? '' }}" placeholder="0 (Isi 0 jika gratis)"
                            class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                        <p class="text-xs text-gray-400 mt-1 ml-1">Masukkan angka saja (Contoh: 50000).</p>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Deskripsi Lengkap</label>
                            <textarea name="description" rows="5" placeholder="Jelaskan detail event..."
                                      class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium resize-none">{{ $event->description ?? '' }}</textarea>
                        </div>

                    </div>

                    
                    <div class="flex items-center justify-end gap-4 px-8 py-6 border-t border-gray-100 bg-gray-50">
                        <button type="button" class="px-6 py-3 rounded-lg text-base font-bold text-gray-500 hover:bg-gray-200 hover:text-gray-900 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-8 py-3 rounded-lg text-base font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-200 transform hover:-translate-y-0.5 transition-all">
                            {{ isset($event) ? 'Simpan Perubahan' : 'Buat Event Sekarang' }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-front-page.layout>