<x-back-page.layout>
<x-slot:title> {{$title}} </x-slot:title>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total User</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1">1,250</h3>
                </div>
                <div class="p-3 bg-blue-50 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="Group-12 17l-4 4m0 0l-4-4m4 4V3" x-description="User Icon Placeholder"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Event</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1">48</h3>
                </div>
                <div class="p-3 bg-purple-50 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-purple-500 font-semibold">5 Active</span>
                <span class="text-gray-400 ml-2">saat ini berjalan</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Kategori</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1">12</h3>
                </div>
                <div class="p-3 bg-orange-50 rounded-lg">
                    <svg class="w-8 h-8 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">  <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" /></svg>
                </div>
            </div>
        </div>

    </div>

    <!-- PDF Reporting Section -->
    <div class="mt-8">
        <h2 class="text-xl font-bold text-gray-900 mb-4">📊 PDF Reporting</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- User Reporting Card -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-sm p-6 border border-blue-200">
                <div class="flex items-start justify-between mb-4">
                    <div class="p-3 bg-white rounded-lg shadow-sm">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">Active</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">User Report</h3>
                <p class="text-sm text-gray-600 mb-4">Generate comprehensive PDF report of all registered users with detailed information.</p>
                <a href="{{ route('reports.users.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 w-full justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    View Report
                </a>
            </div>

            <!-- Event Reporting Card (Coming Soon) -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl shadow-sm p-6 border border-purple-200 opacity-60">
                <div class="flex items-start justify-between mb-4">
                    <div class="p-3 bg-white rounded-lg shadow-sm">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold text-purple-800 bg-purple-200 rounded-full">Soon</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Event Report</h3>
                <p class="text-sm text-gray-600 mb-4">Generate PDF report of all events with complete event details and statistics.</p>
                <button disabled 
                        class="inline-flex items-center px-4 py-2 bg-gray-400 text-white font-medium rounded-lg cursor-not-allowed w-full justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Coming Soon
                </button>
            </div>

            <!-- Category Reporting Card (Coming Soon) -->
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl shadow-sm p-6 border border-orange-200 opacity-60">
                <div class="flex items-start justify-between mb-4">
                    <div class="p-3 bg-white rounded-lg shadow-sm">
                        <svg class="w-8 h-8 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold text-orange-800 bg-orange-200 rounded-full">Soon</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Category Report</h3>
                <p class="text-sm text-gray-600 mb-4">Generate PDF report of all categories with usage statistics and details.</p>
                <button disabled 
                        class="inline-flex items-center px-4 py-2 bg-gray-400 text-white font-medium rounded-lg cursor-not-allowed w-full justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Coming Soon
                </button>
            </div>

        </div>
    </div>

</div>
</x-back-page.layout>
