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
                <button id="btnCreateCategory" class="px-4 py-2 bg-indigo-600 text-white rounded-base shadow hover:bg-indigo-700 text-sm font-medium transition-colors cursor-pointer">
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

                    <!-- 🔥 Tambahan kolom AKSI -->
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">1</td>
                    <td class="px-6 py-4">Teknologi</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </td>
                </tr>

                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">2</td>
                    <td class="px-6 py-4">Politik</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </td>
                </tr>

                <tr class="bg-neutral-primary-soft hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4">Olahraga</td>

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

    <div id="createCategoryModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100">
                
                <div class="px-6 py-4 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Tambah Kategori Baru</h3>
                    <button id="btnCloseModal" type="button" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="formCreateCategory" class="p-6 space-y-5">
                    
                    <div>
                        <label for="categoryName" class="block text-sm font-semibold text-gray-700 mb-1">Nama Kategori</label>
                        <input type="text" id="categoryName" required placeholder="Contoh: Otomotif" 
                            class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    </div>

                    <div>
                        <label for="categorySlug" class="block text-sm font-semibold text-gray-700 mb-1">Slug (Auto)</label>
                        <input type="text" id="categorySlug" disabled placeholder="otomotif" 
                            class="block w-full px-3 py-2 bg-gray-50 border border-gray-200 text-gray-500 text-sm rounded-lg cursor-not-allowed">
                    </div>

                    <div>
                        <label for="categoryDesc" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Singkat</label>
                        <textarea id="categoryDesc" rows="3" placeholder="Deskripsi kategori..." 
                            class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none resize-none transition-all"></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" id="btnCancelModal" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg text-sm hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 shadow-lg shadow-indigo-500/30 text-sm transition-all">
                            Simpan Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="toastSuccess" class="fixed top-5 right-5 z-[60] hidden transform transition-all duration-300 ease-in-out translate-x-full">
    <div class="flex items-center w-full max-w-xs p-4 space-x-3 text-gray-500 bg-white rounded-lg shadow-lg border-l-4 border-green-500">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>
        </div>
        <div class="ml-3 text-sm font-normal text-gray-800">Kategori berhasil dibuat!</div>
    </div>
</div>

<script>
    // --- SETUP ELEMENT ---
    const modal = document.getElementById('createCategoryModal');
    const btnOpen = document.getElementById('btnCreateCategory');
    const btnClose = document.getElementById('btnCloseModal');
    const btnCancel = document.getElementById('btnCancelModal');
    const form = document.getElementById('formCreateCategory');
    
    // Element Input
    const inputName = document.getElementById('categoryName');
    const inputSlug = document.getElementById('categorySlug');
    const inputDesc = document.getElementById('categoryDesc');
    const tableBody = document.querySelector('tbody');

    // Toast
    const toast = document.getElementById('toastSuccess');

    // --- FUNGSI BUKA/TUTUP MODAL ---
    const toggleModal = () => {
        modal.classList.toggle('hidden');
    }

    if(btnOpen) btnOpen.addEventListener('click', () => {
        form.reset(); // Kosongkan form pas dibuka
        inputSlug.value = ""; // Reset slug
        toggleModal();
    });
    
    if(btnClose) btnClose.addEventListener('click', toggleModal);
    if(btnCancel) btnCancel.addEventListener('click', toggleModal);

    // --- FITUR AUTO SLUG ---
    // Bikin slug otomatis dari nama (Spasi jadi strip, huruf kecil semua)
    inputName.addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        inputSlug.value = slug;
    });

    // --- LOGIC SIMPAN (CREATE) ---
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Jangan refresh halaman

        // Ambil Data
        const name = inputName.value;
        const slug = inputSlug.value;
        const desc = inputDesc.value;
        
        // Hitung Nomor Urut
        const newNo = tableBody.rows.length + 1;

        // Bikin Baris Baru (HTML)
        // Style disamain: bg-neutral-primary-soft (atau sesuaikan dengan tabel lu)
        const newRow = `
            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium transition-colors">
                <td class="px-6 py-4 text-center">${newNo}</td>
                <td class="px-6 py-4 font-medium text-heading">${name}</td>
                
                <td class="px-6 py-4 text-center">
                    <button class="text-brand font-medium hover:underline mr-4">Update</button>
                    <button class="text-red-600 font-medium hover:underline" onclick="this.closest('tr').remove()">Delete</button>
                </td>
            </tr>
        `;

        // Masukin ke Tabel
        tableBody.insertAdjacentHTML('beforeend', newRow);

        // Munculin Notif
        toast.classList.remove('hidden', 'translate-x-full');
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.classList.add('hidden'), 300);
        }, 3000);

        toggleModal();
        form.reset();
    });
</script>
</body>
