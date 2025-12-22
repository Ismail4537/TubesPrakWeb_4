<nav class="bg-[#1C1E23]">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="shrink-0">
          <a class="text-white text-2xl font-semibold" href="/">Acarra</a>
        </div>

        {{-- Menu umum --}}
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <x-front-page.nav-link href="/about" :active="request()->is('about')">About</x-front-page.nav-link>
            <x-front-page.nav-link href="/event" :active="request()->is('event')">Event</x-front-page.nav-link>
            <x-front-page.nav-link href="/contac" :active="request()->is('contac')">Contacts</x-front-page.nav-link>
          </div>
        </div>
      </div>

      {{-- Auth Menu --}}
      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6 space-x-2">
          @guest
            <x-front-page.nav-link href="/login" :active="request()->is('login')">Sign In</x-front-page.nav-link>
            <x-front-page.nav-link href="/register" :active="request()->is('register')">Sign Up</x-front-page.nav-link>
          @else
            <div class="relative ml-3" x-data="{ open: false }">
              <div>
                <button @click="open = !open" type="button" class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-10 w-10 rounded-full object-cover border-2 border-white/20 hover:border-white transition" 
                      src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=random&color=fff' }}" 
                      alt="Profile">
                </button>
              </div>

              <div x-show="open" 
                  @click.away="open = false"
                  x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg  focus:outline-none" role="menu">
                
                <div class="px-4 py-2 border-b border-gray-100">
                  <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                  <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>

                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                
                @if(Auth::user()->role === 'admin')
                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard Admin</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" role="menuitem">
                    Sign out
                  </button>
                </form>
              </div>
            </div>
          @endguest
        </div>
      </div>
        <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
    </div>
  </div>

  <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">

          {{-- Menu umum Mobile --}}
          <x-front-page.nav-link href="/" :active="request()->is('/')">Home</x-front-page.nav-link>
          <x-front-page.nav-link href="/about" :active="request()->is('about')">About</x-front-page.nav-link>
          <x-front-page.nav-link href="/event" :active="request()->is('event')">Event</x-front-page.nav-link>
          <x-front-page.nav-link href="/contact" :active="request()->is('contact')">Contacts</x-front-page.nav-link>

          @guest
              {{-- User belum login --}}
              <x-front-page.nav-link href="/login" :active="request()->is('login')">Sign In</x-front-page.nav-link>
              <x-front-page.nav-link href="/register" :active="request()->is('register')">Sign Up</x-front-page.nav-link>
          @endguest

      </div>

      @auth
      {{-- User sudah login --}}
      <div class="border-t border-white/10 pt-4 pb-3">
          <div class="flex items-center px-5">
              <div class="shrink-0">
                  <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.Auth::user()->name }}"
                      alt="Profile"
                      class="size-10 rounded-full outline -outline-offset-1 outline-white/10">
              </div>
              <div class="ml-3">
                  <div class="text-base/5 font-medium text-white">{{ Auth::user()->name }}</div>
                  <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
              </div>
          </div>

          <div class="mt-3 space-y-1 px-2">

              <a href="/dashboard"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">
                  Dashboard
              </a>

              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit"
                      class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">
                      Sign Out
                  </button>
              </form>

          </div>
      </div>
      @endauth

  </el-disclosure>
</nav>