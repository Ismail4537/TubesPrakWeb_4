<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center font-sans p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="p-8 text-center">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Selamat Datang!</h1>
            <p class="text-slate-500 text-sm">Masukan email dan password </p>
        </div>

        <form action="/login" method="POST" class="px-8 pb-8 space-y-5">
            @csrf
            
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif
            
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
                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit" 
                class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-lg shadow-indigo-200 transition transform hover:-translate-y-0.5">
                Masuk Sekarang
            </button>

            <div class="text-center mt-6 text-sm text-slate-500">
                Belum punya akun? 
                <a href="/register" class="font-bold text-indigo-600 hover:text-indigo-800 transition">Daftar di sini</a>
            </div>
            </form>
        </div>

</body>
</html>