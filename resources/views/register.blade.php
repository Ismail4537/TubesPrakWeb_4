<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center font-sans p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        
        <div class="p-8 text-center">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Buat Akun Baru </h1>
            <p class="text-slate-500 text-sm">Lengkapi data diri untuk memulai</p>
        </div>
        
        <form action="/register" method="POST" class="px-8 pb-8 space-y-5">
            @csrf
            
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="usertampan123">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="nama@email.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required minlength="8" class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="••••••••">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required minlength="8" class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="••••••••">
            </div>

            <button type="submit" style="cursor: pointer; z-index: 10; position: relative;"
                class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition">
                Daftar Sekarang
            </button>

            <div class="text-center mt-6 text-sm text-slate-500">
                Sudah punya akun? 
                <a href="/login" class="font-bold text-indigo-600 hover:text-indigo-800 transition">Masuk di sini</a>
            </div>
        </form>
    </div>

</body>
</html>