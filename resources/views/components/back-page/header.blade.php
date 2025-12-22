<header class="h-16 bg-white shadow-sm flex items-center justify-between px-8">
    <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>
    <div class="text-gray-700 font-semibold text-2xl"> 
        {{ $slot }}
    </div>
</header>