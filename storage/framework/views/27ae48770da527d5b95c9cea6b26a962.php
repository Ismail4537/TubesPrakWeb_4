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
                    <input id="searchCategory" type="text" placeholder="Search"
                        class="block w-full ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium
                       text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs">
                </div>

                <!-- Create Button -->
                <a href="<?php echo e(route('dashboard.categories.create')); ?>"
                    class="px-4 py-2 bg-brand text-black rounded-base shadow hover:bg-brand-dark text-sm">
                    Create
                </a>



            </div>

            <!-- Filter Button --
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="shrink-0 flex items-center text-body bg-neutral-secondary-medium border border-default-medium
               px-3 py-2 rounded-base hover:bg-neutral-tertiary-medium hover:text-heading text-sm">
                Filter
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button -->

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

                    <!-- Tambahan kolom AKSI -->
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>

            <tbody id="categoriesTableBody">


                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="px-6 py-4 text-center"><?php echo e($index + 1); ?></td>

                        <td class="px-6 py-4"><?php echo e($category->name); ?></td>

                        <!-- Aksi -->
                        <td class="px-6 py-4 text-center">
                            <a href="<?php echo e(route('categories.edit', $category->id)); ?>"
                                class="text-brand font-medium hover:underline mr-4">
                                Update
                            </a>

                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST"
                                class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="text-red-600 font-medium hover:underline"
                                    onclick="return confirm('Yakin hapus?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tr>
            </tbody>
        </table>

        <?php if($categories->hasPages()): ?>
                <div class="flex flex-1 justify-between sm:justify-end gap-2">
                    <?php if($categories->onFirstPage()): ?>
                    <button
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </button>
                    <?php else: ?>
                    <a href="<?php echo e($categories->previousPageUrl()); ?>"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </a>
                    <?php endif; ?>
                    <div class="hidden md:flex gap-1">
                        <?php $__currentLoopData = $categories->getUrlRange (1, $categories->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $categories->currentPage()): ?>
                            <a href="<?php echo e($url); ?>"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg"><?php echo e($page); ?></a>
                        <?php else: ?>
                            <a href="<?php echo e($url); ?>"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"><?php echo e($page); ?></a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($categories->hasMorePages()): ?>
                    <a href="<?php echo e($categories->nextPageUrl()); ?>"
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('searchCategory');
            const tableBody = document.getElementById('categoryTableBody');

            let timer = null;

            input.addEventListener('keyup', function() {
                clearTimeout(timer);

                timer = setTimeout(() => {
                    fetch(`<?php echo e(route('dashboard.categories.search')); ?>?q=${this.value}`)
                        .then(res => res.json())
                        .then(data => {
                            tableBody.innerHTML = data.html;
                        });
                }, 300); // debounce
            });
        });
    </script>
    <?php $__env->startPush('scripts'); ?>
        <script>
            (function() {
                const input = document.getElementById('searchCategory');
                const tbody = document.getElementById('categoriesTableBody');
                const fetchUrl = "<?php echo e(route('dashboard.categories.search')); ?>";

                if (!input || !tbody) return;

                let timer;

                input.addEventListener('input', function() {
                    clearTimeout(timer);

                    timer = setTimeout(async () => {
                        const q = input.value.trim();

                        try {
                            const res = await fetch(`${fetchUrl}?q=${encodeURIComponent(q)}`);
                            const data = await res.json();
                            tbody.innerHTML = data.html;
                        } catch (e) {
                            tbody.innerHTML = `
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-red-500">
                            Gagal memuat data
                        </td>
                    </tr>
                `;
                        }
                    }, 300);
                });
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
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/dashboard/categories/categories.blade.php ENDPATH**/ ?>