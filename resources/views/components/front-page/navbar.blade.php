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
            <x-front-page.nav-link href="/contact" :active="request()->is('contact')">Contacts</x-front-page.nav-link>
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
          {{-- Logged in user info --}}
          <span class="text-gray-300 text-sm">Halo, {{ Auth::user()->name }}</span>
          
          {{-- Logout button --}}
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white transition">
              Logout
            </button>
          </form>
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

              <button type="button"
                  class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white">
                  <span class="sr-only">View notifications</span>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                      class="size-6">
                      <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
              </button>
          </div>

          <div class="mt-3 space-y-1 px-2">

              <a href="/dashboard"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">
                  Dashboard
              </a>

              <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">
                  Settings
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