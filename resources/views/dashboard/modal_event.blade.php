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
                <button id="btnCreateEvent" 
                class="px-4 py-2 bg-blue-600 text-white rounded-base shadow hover:bg-blue-700 text-sm cursor-pointer font-medium transition-colors">
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
                    <th class="px-6 py-3 font-medium">Event Photo</th>
                    <th class="px-6 py-3 font-medium">Judul Event</th>
                    <th class="px-6 py-3 font-medium">Lokasi Event</th>
                    <th class="px-6 py-3 font-medium">Deskripsi Event</th>
                    <th class="px-6 py-3 font-medium">Kategori</th>
                    <th class="px-6 py-3 font-medium">Jadwal</th>
                    <th class="px-6 py-3 font-medium">Status</th>

                    <!-- Tambahan kolom AKSI -->
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">1</td>
                    <td class="px-6 py-4 text-center">
                        <img src="" alt="foto event" class="w-16 h-10 object-cover mx-auto rounded-md">
                    </td>
                    <td class="px-6 py-4">Konferensi meja bundar</td>
                    <td class="px-6 py-4">Jln.toraya</td>
                    <td class="px-6 py-4">Meja bundar-bundar</td>
                    <td class="px-6 py-4">Politik</td>
                    <td class="px-6 py-4">2025-12-01 09:00 / 2025-12-01 17:00</td>
                    <td class="px-6 py-4">Ongoing</td>

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
                    <td class="px-6 py-4 text-center">
                        <img src="" alt="foto event" class="w-16 h-10 object-cover mx-auto rounded-md">
                    </td>
                    <td class="px-6 py-4">Workshop wpu</td>
                    <td class="px-6 py-4">Jln.toraya</td>
                    <td class="px-6 py-4">Meja bundar-bundar</td>
                    <td class="px-6 py-4">Teknologi</td>
                    <td class="px-6 py-4">2025-12-02 10:00 / 2025-12-02 16:00</td>
                    <td class="px-6 py-4">Scheduled</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <button class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </td>
                </tr>

                <tr class="bg-neutral-primary-soft hover:bg-neutral-secondary-medium">
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4 text-center">
                        <img src="" alt="foto event" class="w-16 h-10 object-cover mx-auto rounded-md">
                    </td>
                    <td class="px-6 py-4">Webinar Seraton</td>
                    <td class="px-6 py-4">Jln.toraya</td>
                    <td class="px-6 py-4">Meja bundar-bundar</td>
                    <td class="px-6 py-4">Teknologi</td>
                    <td class="px-6 py-4">2025-12-03 11:00 / 2025-12-03 15:00</td>
                    <td class="px-6 py-4">Canceled</td>

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

    
<div id="createEventModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100">
                <div class="px-6 py-4 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900" id="modal-title">Tambah Event Baru</h3>
                    <button id="btnCloseModal" type="button" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="formCreateEvent" class="p-6 space-y-5">
                    <input type="hidden" id="editRowIndex" value="">
                    <div>
                        <label for="eventTitle" class="block text-sm font-semibold text-gray-700 mb-1">Judul Event</label>
                        <input type="text" id="eventTitle" required placeholder="Contoh: Webinar Teknologi" 
                            class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                    </div>
                    <div>
                        <label for="eventLocation" class="block text-sm font-semibold text-gray-700 mb-1">Lokasi Event</label>
                        <input type="text" id="eventLocation" required 
                            class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                    </div>
                    <div>
                        <label for="eventDescription" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="eventDescription" id="eventDescription" required
                            class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" rows="4" placeholder="Deskripsikan event Anda..."
                        ></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                            <select id="eventCategory" class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                                <option>Teknologi</option>
                                <option>Politik</option>
                                <option>Hiburan</option>
                                <option>Pendidikan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                            <select id="eventStatus" class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                                <option value="Scheduled">Scheduled</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Canceled">Canceled</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Mulai</label>
                            <input type="datetime-local" id="startDate" required class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Selesai</label>
                            <input type="datetime-local" id="endDate" required class="block w-full px-3 py-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Foto Event</label>
                        <input name="eventPhoto" id="eventPhoto" type="file" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" id="btnCancelModal" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg text-sm hover:bg-gray-50">Batal</button>
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
        <div class="ml-3 text-sm font-normal text-gray-800" id="toastMessage">Berhasil disimpan!</div>
    </div>
</div>

<script>
    // --- SETUP VARIABEL ---
    const modal = document.getElementById('createEventModal');
    const btnOpen = document.getElementById('btnCreateEvent'); // Tombol Create di atas tabel
    const btnClose = document.getElementById('btnCloseModal');
    const btnCancel = document.getElementById('btnCancelModal');
    
    const form = document.getElementById('formCreateEvent');
    const modalTitle = document.getElementById('modal-title');
    const inputRowIndex = document.getElementById('editRowIndex'); // Input Rahasia
    const tableBody = document.querySelector('tbody');
    
    const toast = document.getElementById('toastSuccess');
    const toastMsg = document.getElementById('toastMessage');

    // --- LOGIC BUKA TUTUP MODAL ---
    const toggleModal = () => modal.classList.toggle('hidden');

    // Klik Create (Buat Baru)
    if(btnOpen) {
        btnOpen.addEventListener('click', () => {
            form.reset();               
            inputRowIndex.value = "";   // Kosongin index (Tanda Mode Create)
            modalTitle.innerText = "Tambah Event Baru";
            toggleModal();
        });
    }

    if(btnClose) btnClose.addEventListener('click', toggleModal);
    if(btnCancel) btnCancel.addEventListener('click', toggleModal);

    // --- LOGIC EDIT (Dipanggil tombol Update) ---
    window.openEditModal = (button) => {
        const row = button.closest('tr');
        
        // Ambil data
        const title = row.cells[2].innerText; 
        const location = row.cells[3].innerText;
        const description = row.cells[4].innerText;
        const category = row.cells[5].innerText;
        const fullDate = row.cells[6].innerText;
        const status = row.cells[7].innerText.trim();

        // Pecah tanggal
        const [start, end] = fullDate.split(' / ');

        // Masukin ke form
        document.getElementById('eventTitle').value = title;
        document.getElementById('eventLocation').value = location;
        document.getElementById('eventDescription').value = description;
        document.getElementById('eventCategory').value = category;
        document.getElementById('eventStatus').value = status;
        
        if(start) document.getElementById('startDate').value = start.replace(' ', 'T');
        if(end) document.getElementById('endDate').value = end.replace(' ', 'T');

        inputRowIndex.value = row.rowIndex; // Simpan baris keberapa
        modalTitle.innerText = "Edit Event";
        toggleModal();
    };

    // --- LOGIC NOTIFIKASI ---
    const showToast = (message) => {
        toastMsg.innerText = message;
        toast.classList.remove('hidden', 'translate-x-full'); 
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.classList.add('hidden'), 300);
        }, 3000);
    };

    // --- LOGIC SIMPAN (CREATE ATAU UPDATE) ---
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); 

            // Ambil Values
            const title = document.getElementById('eventTitle').value;
            const category = document.getElementById('eventCategory').value;
            const status = document.getElementById('eventStatus').value;
            const start = document.getElementById('startDate').value.replace('T', ' ');
            const end = document.getElementById('endDate').value.replace('T', ' ');
            const rowIndex = inputRowIndex.value; 

            // Warna Badge Status
            let colorClass = 'bg-blue-100 text-blue-700'; // Scheduled
            if(status === 'Ongoing') colorClass = 'bg-green-100 text-green-700';
            if(status === 'Canceled') colorClass = 'bg-red-100 text-red-700';

            if (rowIndex) {
                // === MODE UPDATE ===
                const table = document.querySelector('table');
                const row = table.rows[rowIndex]; 

                if(row) {
                    row.cells[1].innerText = title;
                    row.cells[2].innerText = category;
                    row.cells[3].innerText = `${start} / ${end}`;
                    
                    // Update Badge HTML (Pastikan style konsisten)
                    row.cells[4].innerHTML = `<span class="px-2 py-1 rounded text-xs font-semibold ${colorClass}">${status}</span>`;
                    
                    showToast('Event berhasil diperbarui!');
                }
            } else {
                // === MODE CREATE ===
                const newNo = tableBody.rows.length + 1;

                // HTML BARIS BARU (Udah dibenerin class-nya biar gak kedip & ukurannya sama)
                const newRow = `
                    <tr class="bg-neutral-primary-soft border-b border-black-200 hover:bg-neutral-secondary-medium transition-colors">
                        <td class="px-6 py-4 text-center">${newNo}</td>
                        <td class="px-6 py-4 font-medium text-heading">${title}</td>
                        <td class="px-6 py-4">${category}</td>
                        <td class="px-6 py-4 text-sm">${start} / ${end}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-xs font-semibold ${colorClass}">${status}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="openEditModal(this)" class="text-brand font-medium hover:underline mr-4">Update</button>
                            <button class="text-red-600 font-medium hover:underline" onclick="this.closest('tr').remove()">Delete</button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', newRow);
                showToast('Event baru berhasil dibuat!');
            }

            toggleModal();
            form.reset();
        });
    }
</script>
</body>
