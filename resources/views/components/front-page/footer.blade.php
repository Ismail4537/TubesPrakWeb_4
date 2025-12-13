<footer class="bg-[#1C1E23] text-gray-400 py-12 border-t border-gray-800 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Top Section: Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">

            {{-- Column 1: Logo & Tagline --}}
            <div class="lg:col-span-2">
                <a href="/" class="inline-block mb-4">
                    <span class="text-3xl font-bold text-white tracking-tight">Acarra</span>
                </a>
                <p class="mb-6 text-sm leading-relaxed max-w-sm">
                    Harga terbaik tiket untuk event-event seru dan menarik menantimu di Acarra!
                    Temukan pengalaman baru setiap hari.
                </p>
            </div>

            {{-- Column 2: Use Acarra --}}
            <div>
                <h3 class="text-white font-semibold mb-4 uppercase text-xs tracking-wider">Use Acarra</h3>
                <ul class="space-y-3 text-sm">
                    <li><p>Best Offers</p></li>
                    <li><p>Places with Best Deal</p></li>
                    <li><p>Help Center</p></li>
                    <li><p>Privacy Policy</p></li>
                    <li><p>Terms and Conditions</p></li>
                </ul>
            </div>

            {{-- Column 3: Experience Business --}}
            <div>
                <h3 class="text-white font-semibold mb-4 uppercase text-xs tracking-wider">Experience Business</h3>
                <ul class="space-y-3 text-sm">
                    <li><p>Experience Manager</p></li>
                    <li><p>Online Event Management</p></li>
                    <li><p>Ticket Scanner</p></li>
                </ul>
            </div>

            {{-- Column 4: Pages --}}
            <div>
                <h3 class="text-white font-semibold mb-4 uppercase text-xs tracking-wider">Pages</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="/" class="hover:text-blue-500 transition-colors">Homepage</a></li>
                    <li><a href="/about" class="hover:text-blue-500 transition-colors">About Us</a></li>
                    <li><a href="/event" class="hover:text-blue-500 transition-colors">Event</a></li>
                    <li><a href="/contact" class="hover:text-blue-500 transition-colors">Contact</a></li>
                </ul>
            </div>
            
        </div>

        {{-- Divider --}}
        <div class="border-t border-gray-800 my-8"></div>

        {{-- Bottom Section --}}
        <div class="flex flex-col md:flex-row justify-between items-center text-sm">

            {{-- Copyright --}}
            <div class="mb-4 md:mb-0">
                <p>&copy; {{ date('Y') }} Acarra. All Rights Reserved.</p>
            </div>

            {{-- Link --}}
            <div class="flex space-x-6">
              <p>This Acarra website is 
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    open source on GitHub
                </a>
              </p>
            </div>
        </div>
    </div>
</footer>