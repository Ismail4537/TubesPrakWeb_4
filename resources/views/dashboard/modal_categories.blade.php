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

                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">1</td>
                    <td class="px-6 py-4">Teknologi</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button onclick="openEditModal(this)" class="text-brand font-medium hover:underline mr-4">
                            Update
                        </button>
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
                    <input type="hidden" id="editRowIndex" value="">
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
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. SETUP VARIABEL & ELEMENT
    
    console.log("Script Categories Dimuat! "); 

    const modal       = document.getElementById('createCategoryModal');
    const form        = document.getElementById('formCreateCategory');
    const tableBody   = document.querySelector('tbody');
    const toast       = document.getElementById('toastSuccess');
    
    // Tombol
    const btnOpen     = document.getElementById('btnCreateCategory'); // Tombol Create
    const btnClose    = document.getElementById('btnCloseModal');     // Tombol X
    const btnCancel   = document.getElementById('btnCancelModal');    // Tombol Batal

    // Input Form
    const inputName     = document.getElementById('categoryName');
    const inputSlug     = document.getElementById('categorySlug');
    const inputRowIndex = document.getElementById('editRowIndex');
    const modalTitle    = document.getElementById('modal-title');

    
    // 2. FUNGSI BANTUAN
    
    
    // Buka/Tutup Modal
    const toggleModal = () => {
        if(modal) {
            modal.classList.toggle('hidden');
        } else {
            console.error("Modal gak ketemu bang!");
        }
    };

    // Munculin Toast
    const showToast = () => {
        if(toast) {
            toast.classList.remove('hidden', 'translate-x-full');
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.classList.add('hidden'), 300);
            }, 3000);
        }
    };

    // Bikin Slug Otomatis
    const generateSlug = (text) => {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    };

    // 3. EVENT LISTENERS

    // A. TOMBOL CREATE (Buka Modal Kosong)
    if(btnOpen) {
        btnOpen.addEventListener('click', () => {
            console.log("Tombol Create Diklik!"); // Debugging
            form.reset();               
            if(inputSlug) inputSlug.value = "";       
            if(inputRowIndex) inputRowIndex.value = "";   
            if(modalTitle) modalTitle.innerText = "Tambah Kategori Baru"; 
            toggleModal();
        });
    } else {
        console.error("Tombol Create (btnCreateCategory) gak ketemu!");
    }

    // B. TOMBOL CLOSE & CANCEL
    if(btnClose) btnClose.addEventListener('click', toggleModal);
    if(btnCancel) btnCancel.addEventListener('click', toggleModal);
    
    // C. AUTO SLUG (Pas ngetik nama)
    if(inputName) {
        inputName.addEventListener('input', function() {
            if(inputSlug) inputSlug.value = generateSlug(this.value);
        });
    }

    // D. TOMBOL UPDATE (Dipanggil dari HTML onclick)
    window.openEditModal = (button) => {
        console.log("Tombol Update Diklik!");
        const row = button.closest('tr');
        
        // Ambil Data Nama (Kolom ke-2)
        const currentName = row.cells[1].innerText;
        
        // Isi ke Form
        if(inputName) inputName.value = currentName;
        if(inputSlug) inputSlug.value = generateSlug(currentName);
        if(inputRowIndex) inputRowIndex.value = row.rowIndex; 
        if(modalTitle) modalTitle.innerText = "Edit Kategori";
        toggleModal();
    };

    // E. SIMPAN DATA (SUBMIT)
    if(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log("Form Disubmit!");

            const newName = inputName.value;
            const targetIndex = inputRowIndex.value;

            if (targetIndex) {
                // === MODE EDIT (UPDATE) ===
                const row = document.querySelector('table').rows[targetIndex];
                if(row) {
                    row.cells[1].innerText = newName;
                }
            } else {
                // === MODE CREATE (BARU) ===
                const newNo = tableBody.rows.length + 1;
                
                // HTML Baris Baru
                const newRowHTML = `
                    <tr class="bg-neutral-primary-soft border-b border-black-200 hover:bg-neutral-secondary-medium transition-colors">
                        <td class="px-6 py-4 text-center">${newNo}</td>
                        <td class="px-6 py-4 font-medium text-heading">${newName}</td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="openEditModal(this)" class="text-indigo-600 font-medium hover:underline mr-4">Update</button>
                            <button class="text-red-600 font-medium hover:underline" onclick="this.closest('tr').remove()">Delete</button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', newRowHTML);
            }

            showToast();
            toggleModal();
            form.reset();
        });
    }
});
</script>
</body>
