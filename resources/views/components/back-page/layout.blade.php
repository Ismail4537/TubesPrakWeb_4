<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard - {{$title}}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>

</head>

<body>
    <div class="min-h-screen bg-gray-100 flex" x-data="{ sidebarOpen: true, activeMenu: '{{$title}}' }">        
        <x-back-page.navbar></x-back-page.navbar>

        <main class="flex-1 flex flex-col">
            <x-back-page.header> {{ $title }} </x-back-page.header>
            <div class="p-8">
                <div class="h-96 flex items-center justify-center text-gray-400">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>

</html>