<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black/50 lg:hidden transition-opacity">
</div>
<aside
    class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white transform transition-transform duration-300 lg:relative lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-800">
        <span class="text-2xl font-bold tracking-wider text-center text-blue-400"> DASHBOARD </span>
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <nav class="mt-6 px-4 space-y-2">

        <x-back-page.nav-link href="/dashboard" :active="request()->is('dashboard')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </x-back-page.nav-link>

        <x-back-page.nav-link href="{{ route('dashboard.users.index') }}" :active="request()->is('dashboard/users')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="font-medium">User Management</span>
        </x-back-page.nav-link>

        <x-back-page.nav-link href="{{ route('dashboard.events.index') }}" :active="request()->is('dashboard/events')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">Event Management</span>
        </x-back-page.nav-link>


        <x-back-page.nav-link href="{{ route('dashboard.categories') }}" :active="request()->is('dashboard/categories')">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
            </svg>
            <span class="font-medium">Categories Management</span>
        </x-back-page.nav-link>



    </nav>

    <div class="absolute bottom-0 w-full p-4 border-t border-slate-800 bg-slate-900/50">
        <div class="flex items-center gap-3 px-2">
            <img src="{{ asset(Auth::user()->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name) }}"
                alt="" class="w-10 h-10 rounded-full flex items-center justify-center font-bold">
            <div>
                <a href="{{ route('profile') }}" class="text-sm font-semibold">{{ Auth::user()->name }}</a>
                <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
            </div>
            <div class="float-end ml-auto">
                <a href="/">
                    <button type="submit" class="text-gray-400 hover:text-white" title="Logout">
                        <svg class="w-7 h-7 hover:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
</aside>
