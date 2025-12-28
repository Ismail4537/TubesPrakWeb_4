<?php if (isset($component)) { $__componentOriginal9f1bd0e1d04155988af00158efd48dd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f1bd0e1d04155988af00158efd48dd8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-page.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('back-page.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?>  <?php echo e($title); ?>  <?php $__env->endSlot(); ?>

    <div class="max-w-6xl mx-auto">
        
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
            <div class="flex flex-1 items-center gap-2 max-w-2xl">
                
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input id="searchUsers" type="text" placeholder="Cari user..."
                        class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none text-sm shadow-sm" />
                </div>

                <div class="shrink-0">
                    <select id="filterRole"
                        class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 outline-none text-sm shadow-sm">
                        <option value="">Semua Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>

            
        </div>

        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Nama/Foto Profil</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">No. Telp</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Tgl Lahir</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody" class="divide-y divide-gray-200 text-sm">
                        <?php $__empty_1 = true; $__currentLoopData = $users ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-600"><?php echo e($index + 1); ?></td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    <a href="<?php echo e(route('contac.show', ['id' => $user->id])); ?>">
                                        <img class="h-10 w-10 rounded-full object-cover border-2 border-white/20 hover:border-white transition"
                                            src="<?php echo e($user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random&color=fff'); ?>"
                                            alt="Profile">
                                        <?php echo e($user->name); ?>

                                    </a>
                                </td>
                                <td class="px-6 py-4 text-gray-600"><?php echo e($user->email); ?></td>
                                <td class="px-6 py-4 text-gray-600"><?php echo e($user->phone ?? '-'); ?></td>
                                <td class="px-6 py-4 text-gray-600">
                                    <?php echo e($user->birthdate ?? '-'); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php
                                        $role = strtolower($user->role ?? 'user');
                                        $roleClass =
                                            $role === 'admin'
                                                ? 'bg-purple-100 text-purple-700'
                                                : 'bg-blue-100 text-blue-700';
                                    ?>
                                    <span
                                        class="px-2 py-1 <?php echo e($roleClass); ?> rounded-full text-[10px] font-bold uppercase">
                                        <?php echo e($user->role ?? 'User'); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <?php if(Auth::id() === $user->id): ?>
                                            <a href="<?php echo e(route('profile.edit', $user->id)); ?>"
                                                class="text-blue-500 font-medium hover:underline">Edit</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('dashboard.users.edit', $user->id)); ?>"
                                                class="text-blue-500 font-medium hover:underline">Edit</a>

                                            <form action="<?php echo e(route('dashboard.users.destroy', $user->id)); ?>"
                                                method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="text-red-600 font-medium hover:underline">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="px-6 py-8 text-center text-gray-500" colspan="7">
                                    <div class="flex flex-col items-center">
                                        <span class="text-sm">Tidak ada data pengguna.</span>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="hidden sm:flex flex-1 items-center">
                    <p class="text-sm text-gray-600">
                        Menampilkan <span class="font-medium">1</span> sampai <span
                            class="font-medium"><?php echo e(count($users ?? [])); ?></span> hasil
                    </p>
                </div>

                <?php if($users->hasPages()): ?>
                    <div class="flex flex-1 justify-between sm:justify-end gap-2">
                        <?php if($users->onFirstPage()): ?>
                            <button
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Previous
                            </button>
                        <?php else: ?>
                            <a href="<?php echo e($users->previousPageUrl()); ?>"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Previous
                            </a>
                        <?php endif; ?>

                        <div class="hidden md:flex gap-1">
                            <?php $__currentLoopData = $users->getUrlRange(1, $users->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $users->currentPage()): ?>
                                    <span
                                        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg"><?php echo e($page); ?></span>
                                <?php else: ?>
                                    <a href="<?php echo e($url); ?>"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"><?php echo e($page); ?></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <?php if($users->hasMorePages()): ?>
                            <a href="<?php echo e($users->nextPageUrl()); ?>"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Next
                            </a>
                        <?php else: ?>
                            <button
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Next
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            (function() {
                function debounce(fn, delay = 300) {
                    let t;
                    return (...args) => {
                        clearTimeout(t);
                        t = setTimeout(() => fn(...args), delay);
                    };
                }

                const input = document.getElementById('searchUsers');
                const roleSelect = document.getElementById('filterRole');
                const tbody = document.getElementById('usersTableBody');
                const url = "<?php echo e(route('dashboard.users.search')); ?>";

                if (!input || !tbody) return;

                const fetchData = debounce(async () => {
                    const q = input.value.trim();
                    const role = roleSelect ? roleSelect.value : '';

                    const params = new URLSearchParams({
                        q: q,
                        role: role
                    });

                    try {
                        const res = await fetch(`${url}?${params.toString()}`);
                        const data = await res.json();
                        tbody.innerHTML = data.html;
                    } catch (e) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="7" class="px-6 py-6 text-center text-red-500">
                                    Gagal memuat data
                                </td>
                            </tr>
                        `;
                    }
                });

                input.addEventListener('input', fetchData);
                if (roleSelect) roleSelect.addEventListener('change', fetchData);
            })();
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f1bd0e1d04155988af00158efd48dd8)): ?>
<?php $attributes = $__attributesOriginal9f1bd0e1d04155988af00158efd48dd8; ?>
<?php unset($__attributesOriginal9f1bd0e1d04155988af00158efd48dd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f1bd0e1d04155988af00158efd48dd8)): ?>
<?php $component = $__componentOriginal9f1bd0e1d04155988af00158efd48dd8; ?>
<?php unset($__componentOriginal9f1bd0e1d04155988af00158efd48dd8); ?>
<?php endif; ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/dashboard/Admin/users.blade.php ENDPATH**/ ?>