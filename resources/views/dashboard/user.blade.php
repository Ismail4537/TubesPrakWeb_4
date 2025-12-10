<header>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</header>

<body>


    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

        <!-- Search, Create, Filter -->
        <div class="p-4 flex items-center justify-between">

            <!-- Search + Create -->
            <div class="flex items-center space-x-3">

                <!-- Search bar -->
                <div class="relative w-full max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search"
                        class="block w-full ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium
                       text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs">
                </div>

                <!-- Create Button -->
                <button class="px-4 py-2 bg-brand text-white rounded-base shadow hover:bg-brand-dark text-sm">
                    Create
                </button>

            </div>

            <!-- Filter Button -->
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="shrink-0 flex items-center text-body bg-neutral-secondary-medium border border-default-medium
               px-3 py-2 rounded-base hover:bg-neutral-tertiary-medium hover:text-heading text-sm">
                Filter
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="dropdown"
                class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-32">
                <ul class="p-2 text-sm text-body font-medium">
                    <li><a href="#" class="block p-2 hover:bg-neutral-tertiary-medium rounded">Role</a></li>
                    <li><a href="#" class="block p-2 hover:bg-neutral-tertiary-medium rounded">Tanggal</a></li>
                    <li><a href="#" class="block p-2 hover:bg-neutral-tertiary-medium rounded">Email</a></li>
                </ul>
            </div>
        </div>

        <!-- TABLE -->
        <table class="w-full text-sm text-left text-body">
            <thead class="bg-neutral-secondary-medium border-b border-default-medium">
                <tr>
                    <th class="px-6 py-3 font-medium text-center">No</th>
                    <th class="px-6 py-3 font-medium">Nama</th>
                    <th class="px-6 py-3 font-medium">Email</th>
                    <th class="px-6 py-3 font-medium">Nomor Telepon</th>
                    <th class="px-6 py-3 font-medium">Tanggal Lahir</th>
                    <th class="px-6 py-3 font-medium">Profile Photo</th>
                    <th class="px-6 py-3 font-medium">Role</th>

                    <!-- 🔥 Tambahan kolom AKSI -->
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">1</td>
                    <td class="px-6 py-4">Raisa Andini</td>
                    <td class="px-6 py-4">raisa@gmail.com</td>
                    <td class="px-6 py-4">08123456789</td>
                    <td class="px-6 py-4">12/03/2000</td>
                    <td class="px-6 py-4">foto1.jpg</td>
                    <td class="px-6 py-4">Admin</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </td>
                </tr>

                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">2</td>
                    <td class="px-6 py-4">Budi Santoso</td>
                    <td class="px-6 py-4">budi@gmail.com</td>
                    <td class="px-6 py-4">08198765432</td>
                    <td class="px-6 py-4">05/09/1999</td>
                    <td class="px-6 py-4">foto2.jpg</td>
                    <td class="px-6 py-4">User</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </td>
                </tr>

                <tr class="bg-neutral-primary-soft hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4">Siti Marlina</td>
                    <td class="px-6 py-4">siti@gmail.com</td>
                    <td class="px-6 py-4">08222333444</td>
                    <td class="px-6 py-4">22/01/2002</td>
                    <td class="px-6 py-4">foto3.jpg</td>
                    <td class="px-6 py-4">Moderator</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>

        <!-- PAGINATION -->
        <div class="flex justify-end items-center space-x-2 px-4 py-4">
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">&lt;</button>
            <button class="border px-3 py-1 rounded bg-neutral-secondary-medium">1</button>
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">2</button>
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">&gt;</button>

        </div>

    </div>


</body>
