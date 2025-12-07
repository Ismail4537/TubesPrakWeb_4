<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-md">
        
        <div class="bg-blue-600 h-32 relative">
            </div>

        <div class="flex justify-center -mt-16 relative">
            <img class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover bg-white" 
                 src="https://ui-avatars.com/api/?name=Dika+FrontEnd&background=0D8ABC&color=fff&size=128" 
                 alt="Foto Profil">
        </div>

        <div class="text-center px-6 py-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Deka</h2>
            
            <p class="text-blue-500 font-medium text-sm mb-4">user</p>

            <div class="bg-blue-50 rounded-lg p-4 mt-4 border border-blue-100">
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Email Address</p>
                <p class="text-lg text-gray-800 font-medium">dika@gmail.com</p>
            </div>

            <div class="mt-6 flex gap-3 justify-center">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-full font-medium hover:bg-blue-700 transition shadow-md">
                    Edit Profile
                </button>
                <button class="bg-white text-blue-600 border border-blue-600 px-6 py-2 rounded-full font-medium hover:bg-blue-50 transition">
                    Logout
                </button>
            </div>
        </div>
    </div>

</body>
</html>