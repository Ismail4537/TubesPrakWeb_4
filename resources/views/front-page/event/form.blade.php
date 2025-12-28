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


                <form action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf


                    @if (isset($event))
                        @method('PUT')
                        <input type="text" name="id" value="{{ $event->id }}" class="hidden">
                    @endif

                    <div class="p-8 space-y-6">


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Event</label>
                            {{-- 
                                value="{{ $event->title ?? '' }}"
                            --}}
                            <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}"
                                placeholder="Contoh: Konser Musik Galau Fest"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi Event</label>
                            <div class="relative">
                                <input type="text" name="location" id="location"
                                    value="{{ old('location', $event->location ?? '') }}"
                                    placeholder="Cari alamat (OpenStreetMap)..." autocomplete="off"
                                    class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                                <div id="location-suggestions"
                                    class="absolute z-[2000] mt-2 w-full rounded-xl border border-gray-200 bg-white shadow-lg overflow-hidden hidden">
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mt-2 ml-1">Atau pilih titik lokasi lewat peta.</p>
                            <div id="location-map" class="mt-3 h-64 rounded-xl border border-gray-200 overflow-hidden">
                            </div>
                            @error('location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Waktu Mulai</label>
                                <input type="datetime-local" name="start_date_time"
                                    value="{{ old('start_date_time', $event->start_date_time ?? '') }}"
                                    class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium text-sm">
                                @error('start_date_time')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Waktu Selesai</label>
                                <input type="datetime-local" name="end_date_time"
                                    value="{{ old('end_date_time', $event->end_date_time ?? '') }}"
                                    class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium text-sm">
                                @error('end_date_time')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kategori Event</label>
                            <select name="category"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium bg-white">
                                <option value="" disabled {{ !isset($event) ? 'selected' : '' }}>Pilih
                                    Kategori...</option>
                                {{-- Contoh Logika Selected untuk Edit --}}
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category', isset($event) && $event->category_id == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Harga Tiket (IDR)</label>
                            <input type="number" name="price" value="{{ old('price', $event->price ?? '') }}"
                                placeholder="0 (kosongkan jika gratis)"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                            <p class="text-xs text-gray-400 mt-1 ml-1">Masukkan angka saja (Contoh: 50000).</p>
                            @error('price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Deskripsi Lengkap</label>
                            <textarea name="description" rows="5" placeholder="Jelaskan detail event..."
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium resize-none">{{ old('description', $event->description ?? '') }}</textarea>
                        </div>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Poster / Banner Event</label>

                            <label
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition-all group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-gray-400 group-hover:text-blue-500 transition-colors"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="text-sm text-gray-500 group-hover:text-blue-600 font-semibold">Klik untuk
                                        pilih foto</p>
                                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (Max. 2MB)</p>
                                </div>
                                <input type="file" name="image_path" class="hidden" readonly />
                            </label>
                            <div class="flex space-x-4">
                                <p name="imgPlaceholder" id="imgPlaceholder">No file chosen</p>
                                @error('image_path')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            @if (isset($event) && $event->status)
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Status event</label>
                            @endif
                            <select name="status"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium bg-white {{ isset($event) && $event->status ? '' : 'hidden' }}">
                                <option value="scheduled"
                                    {{ old('status', isset($event) && $event->status ? 'selected' : '') }}>Scheduled
                                </option>
                                <option value="ongoing"
                                    {{ old('status', isset($event) && $event->status == 'ongoing' ? 'selected' : '') }}>
                                    Ongoing</option>
                                <option value="completed"
                                    {{ old('status', isset($event) && $event->status == 'completed' ? 'selected' : '') }}>
                                    Completed</option>
                                <option value="cancelled"
                                    {{ old('status', isset($event) && $event->status == 'cancelled' ? 'selected' : '') }}>
                                    Cancelled</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-4 px-8 py-6 border-t border-gray-100 bg-gray-50">
                        <a href="{{ route('event.index') }}" type="button"
                            class="px-6 py-3 rounded-lg text-base font-bold text-gray-500 hover:bg-gray-200 hover:text-gray-900 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-8 py-3 rounded-lg text-base font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-200 transform hover:-translate-y-0.5 transition-all">
                            {{ isset($event) ? 'Simpan Perubahan' : 'Buat Event Sekarang' }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <script>
        const photoInput = document.querySelector('input[name="image_path"]');
        const imgPlaceholder = document.getElementById('imgPlaceholder');

        photoInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                imgPlaceholder.textContent = this.files[0].name;
            } else {
                imgPlaceholder.textContent = 'No file chosen';
            }
        });

        (function initNominatimLocationAutocomplete() {
            const input = document.getElementById('location');
            const box = document.getElementById('location-suggestions');
            if (!input || !box) return;

            let debounceId = null;
            let aborter = null;

            function hide() {
                box.classList.add('hidden');
                box.innerHTML = '';
            }

            function showLoading() {
                box.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">Mencari alamat...</div>';
                box.classList.remove('hidden');
            }

            function render(items) {
                if (!items || items.length === 0) {
                    box.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">Alamat tidak ditemukan.</div>';
                    box.classList.remove('hidden');
                    return;
                }

                box.innerHTML = items.map((it) => {
                    const name = (it.display_name || '').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                    return `
                        <button type="button" data-name="${encodeURIComponent(it.display_name || '')}"
                            class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                            ${name}
                        </button>
                    `;
                }).join('');

                box.classList.remove('hidden');

                box.querySelectorAll('button[data-name]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        input.value = decodeURIComponent(btn.getAttribute('data-name') || '');
                        hide();
                    });
                });
            }

            async function search(q) {
                if (aborter) aborter.abort();
                aborter = new AbortController();

                showLoading();
                const url = `/api/geocoding/nominatim/search?q=${encodeURIComponent(q)}`;
                const res = await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    signal: aborter.signal,
                });
                if (!res.ok) {
                    render([]);
                    return;
                }
                const data = await res.json().catch(() => []);
                render(Array.isArray(data) ? data : []);
            }

            input.addEventListener('input', () => {
                const q = (input.value || '').trim();
                if (q.length < 3) {
                    if (aborter) aborter.abort();
                    hide();
                    return;
                }
                if (debounceId) clearTimeout(debounceId);
                debounceId = setTimeout(() => {
                    search(q).catch(() => render([]));
                }, 350);
            });

            input.addEventListener('blur', () => {
                setTimeout(hide, 150);
            });
        })();
    </script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        (function initLocationMapPicker() {
            const mapEl = document.getElementById('location-map');
            const input = document.getElementById('location');
            if (!mapEl || !input || typeof L === 'undefined') return;

            const defaultCenter = [-6.200000, 106.816666]; // Jakarta
            const map = L.map(mapEl).setView(defaultCenter, 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            let marker = L.marker(defaultCenter, {
                draggable: false
            }).addTo(map);

            async function reverseToAddress(lat, lon) {
                const url =
                    `/api/geocoding/nominatim/reverse?lat=${encodeURIComponent(lat)}&lon=${encodeURIComponent(lon)}`;
                const res = await fetch(url, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                if (!res.ok) return;
                const data = await res.json().catch(() => null);
                if (data && data.display_name) {
                    input.value = data.display_name;
                }
            }

            map.on('click', (e) => {
                const lat = e.latlng.lat;
                const lon = e.latlng.lng;
                marker.setLatLng([lat, lon]);
                reverseToAddress(lat, lon).catch(() => {});
            });
        })();
    </script>
</x-front-page.layout>
