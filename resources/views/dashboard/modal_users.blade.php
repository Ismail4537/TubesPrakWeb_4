<header>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</header>

<body>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

        <div class="p-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="relative w-full max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search" class="block w-full ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs">
                </div>
            </div>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="shrink-0 flex items-center text-body bg-neutral-secondary-medium border border-default-medium px-3 py-2 rounded-base hover:bg-neutral-tertiary-medium hover:text-heading text-sm">
                Filter
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
            </button>
        </div>

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
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium transition-colors">
                    <td class="px-6 py-4 text-center">1</td>
                    <td class="px-6 py-4">Raisa Andini</td>
                    <td class="px-6 py-4">raisa@gmail.com</td>
                    <td class="px-6 py-4">08123456789</td>
                    <td class="px-6 py-4">2000-03-12</td>
                    <td class="px-6 py-4">foto1.jpg</td>
                    <td class="px-6 py-4">Admin</td>
                    <td class="px-6 py-4 text-center">
                        <button type="button" onclick="openEditModal(this)" 
                            data-name="Raisa Andini" data-email="raisa@gmail.com" 
                            data-phone="08123456789" data-dob="2000-03-12" data-role="Admin"
                            class="text-brand font-medium hover:underline mr-4">Update</button>
                        <button class="text-red-600 font-medium hover:underline" onclick="this.closest('tr').remove()">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-end items-center space-x-2 px-4 py-4">
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">&lt;</button>
            <button class="border px-3 py-1 rounded bg-neutral-secondary-medium">1</button>
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">2</button>
            <button class="border px-3 py-1 rounded hover:bg-neutral-secondary-medium">&gt;</button>
        </div>
    </div>

    <div id="toast" class="fixed top-5 right-5 z-[100] hidden transform transition-all duration-300 ease-in-out translate-x-full">
        <div class="flex items-center w-full max-w-xs p-4 space-x-3 text-gray-500 bg-white rounded-lg shadow-lg border-l-4 border-green-500">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>
            </div>
            <div class="ml-3 text-sm font-normal text-gray-800" id="toastMessage">Berhasil!</div>
        </div>
    </div>

    <div id="modal-edit" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-slate-900/50 backdrop-blur-sm transition-all">
        <div class="relative w-full max-w-lg bg-white rounded-xl shadow-2xl p-6 mx-4 border border-slate-200">
            <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
                <h3 class="text-xl font-bold text-slate-800">Edit User</h3>
                <button type="button" onclick="closeModal('modal-edit')" class="text-slate-400 hover:text-red-500 font-bold text-2xl transition">&times;</button>
            </div>
            <form id="formEditUser" class="space-y-4">
                <input type="hidden" id="editRowIndex"> <div><label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label><input type="text" id="edit-name" required class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none text-slate-800"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium text-slate-700 mb-1">Email</label><input type="email" id="edit-email" required class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none text-slate-800"></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1">No. Telepon</label><input type="text" id="edit-phone" required class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none text-slate-800"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Lahir</label><input type="date" id="edit-dob" class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none text-slate-800"></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                        <select id="edit-role" class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none bg-white text-slate-800"><option value="User">User</option><option value="Admin">Admin</option></select>
                    </div>
                </div>
                <div><label class="block text-sm font-medium text-slate-700 mb-1">Ganti Foto (Opsional)</label><input type="file" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition"></div>
                
                <div class="mt-8 flex justify-end gap-3 border-t border-slate-100 pt-4">
                    <button type="button" onclick="closeModal('modal-edit')" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50 font-medium">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 font-medium shadow-md">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const tableBody = document.querySelector('tbody');
        const rowIndexInput = document.getElementById('editRowIndex');
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');

        // --- FUNGSI TOAST ---
        function showToast(msg) {
            toastMessage.innerText = msg;
            toast.classList.remove('hidden', 'translate-x-full');
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.classList.add('hidden'), 300);
            }, 3000);
        }

        // --- HELPER MODAL ---
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); document.getElementById(id).classList.add('flex'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); document.getElementById(id).classList.remove('flex'); }

        // --- 1. SETUP TOMBOL EDIT (Isi Form Edit) ---
        window.openEditModal = (btn) => {
            const row = btn.closest('tr');
            rowIndexInput.value = row.rowIndex;
            
            document.getElementById('edit-name').value  = row.cells[1].innerText;
            document.getElementById('edit-email').value = row.cells[2].innerText;
            document.getElementById('edit-phone').value = row.cells[3].innerText;
            document.getElementById('edit-dob').value   = row.cells[4].innerText;
            document.getElementById('edit-role').value  = row.cells[6].innerText;
            openModal('modal-edit');
        };

        // --- 3. LOGIC UPDATE (Simpan Perubahan) ---
        document.getElementById('formEditUser').addEventListener('submit', function(e) {
            e.preventDefault();
            const index = rowIndexInput.value;
            if(!index) return;
            const row = document.querySelector('table').rows[index];
            
            row.cells[1].innerText = document.getElementById('edit-name').value;
            row.cells[2].innerText = document.getElementById('edit-email').value;
            row.cells[3].innerText = document.getElementById('edit-phone').value;
            row.cells[4].innerText = document.getElementById('edit-dob').value || '-';
            row.cells[6].innerText = document.getElementById('edit-role').value;
            
            closeModal('modal-edit');
            showToast('Data user berhasil diupdate!');
        });
    </script>
</body>