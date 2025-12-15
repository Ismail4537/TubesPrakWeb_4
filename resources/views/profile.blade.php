<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen p-4 md:p-8 font-sans">

    <div class="max-w-7xl mx-auto">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div class="md:col-span-1 space-y-6">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 text-center">
                    <div class="relative mx-auto w-32 h-32 mb-4">
                        <img src="https://ui-avatars.com/api/?name=Ismail+457&background=4f46e5&color=fff&size=128" 
                            class="rounded-full w-full h-full object-cover border-4 border-white shadow-lg shadow-indigo-100" alt="Profile">
                    </div>
                    
                    <h2 class="text-xl font-bold text-slate-800">deka</h2>
                    <p class="text-slate-500 text-sm mb-4">Member sejak 2024</p>
                    
                    <a href="/profile/edit" class="block w-full py-2 px-4 bg-white border border-indigo-200 text-indigo-600 rounded-lg text-sm font-medium hover:bg-indigo-50 hover:border-indigo-300 transition">
                        Edit profile
                    </a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h3 class="font-bold text-slate-800 mb-4 border-b pb-2">Detail Info User</h3>
                    <div class="space-y-4 text-sm">
                        
                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Email</span>
                            <span class="text-slate-700 font-medium break-all">dika@gmail.com</span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">No. Telepon</span>
                            <span class="text-slate-700 font-medium">0812-3456-7890</span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Tanggal Lahir</span>
                            <span class="text-slate-700 font-medium">01 Januari 2000</span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Role / Status</span>
                            <span class="inline-block px-3 py-1 mt-1 bg-indigo-100 text-indigo-700 text-xs rounded-full font-bold">
                                USER
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="md:col-span-3">
                
                <div class="flex border-b border-slate-200 mb-6 bg-white rounded-t-xl overflow-hidden shadow-sm">
                    <button class="flex-1 px-6 py-4 text-center text-indigo-600 border-b-2 border-indigo-600 font-bold bg-indigo-50/50">
                        Event yang didaftarkan
                    </button>
                    <button class="flex-1 px-6 py-4 text-center text-slate-500 hover:text-slate-700 hover:bg-slate-50 font-medium transition">
                        Event yang dibuat
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Festival Kuliner Bandung</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>25 Des 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Gedung Sate, Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Festival Kuliner Bandung</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>25 Des 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Gedung Sate, Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Festival Kuliner Bandung</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>25 Des 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Gedung Sate, Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Festival Kuliner Bandung</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>25 Des 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Gedung Sate, Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Festival Kuliner Bandung</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>25 Des 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Gedung Sate, Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Festival Kuliner Bandung</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>25 Des 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Gedung Sate, Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-400 transition">
                            <span class="font-medium">Gambar Event</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">Tech Winter Workshop</h4>
                            <div class="text-sm text-slate-500 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📅</span> <span>10 Jan 2026</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400">📍</span> <span class="truncate">Zoom Meeting</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>
</html>