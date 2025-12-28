<?php if (isset($component)) { $__componentOriginale38455d25d857368dcfc8129c7994fbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale38455d25d857368dcfc8129c7994fbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-page.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('front-page.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?>  <?php echo e($title); ?>  <?php $__env->endSlot(); ?>
    <div class="flex flex-col md:flex-row md:items-center mb-6 space-y-4 space-x-4 md:space-y-0">
        <h1 class="text-3xl font-bold text-gray-800">
            List Contacts
        </h1>

        <div class="w-full md:w-1/3">
            <form action="<?php echo e(route('contac')); ?>" method="GET" class="relative" id="contac-search-form">
                <input id="search-contact" type="text" name="search" placeholder="Cari kontak (nama atau email)"
                    class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="<?php echo e(request('search')); ?>">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>
    </div>
    <div id="contac-grid"
        class="p-4 grid grid-cols-2 gap-2 justify-items-center md:grid-cols-3 lg:grid-cols-5 lg:gap-6.5">
        <?php echo $__env->make('front-page.contac.partials.cards', ['contacts' => $listContact], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    
    <div id="contac-pagination">
        <?php echo $__env->make('front-page.event.partials.pagination', ['paginator' => $listContact], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <script>
        (function() {
            const input = document.getElementById('search-contact');
            const grid = document.getElementById('contac-grid');
            const pagination = document.getElementById('contac-pagination');
            const form = document.getElementById('contac-search-form');

            if (!input || !grid || !pagination || !form) return;

            let timer;
            const debounce = (fn, delay = 300) => {
                clearTimeout(timer);
                timer = setTimeout(fn, delay);
            };

            const fetchResults = (page = null) => {
                const params = new URLSearchParams();
                if (input.value) params.set('q', input.value);
                if (page) params.set('page', page);

                fetch(`<?php echo e(route('contac.search')); ?>?` + params.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        grid.innerHTML = data.html;
                        pagination.innerHTML = data.pagination || '';
                    })
                    .catch(() => {});
            };

            input.addEventListener('input', () => debounce(fetchResults));
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                fetchResults(1);
            });

            pagination.addEventListener('click', (e) => {
                const a = e.target.closest('a');
                if (!a) return;
                const url = new URL(a.href, window.location.origin);
                const pageParam = url.searchParams.get('page') || null;
                if (pageParam) {
                    e.preventDefault();
                    fetchResults(pageParam);
                }
            });
        })();
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale38455d25d857368dcfc8129c7994fbe)): ?>
<?php $attributes = $__attributesOriginale38455d25d857368dcfc8129c7994fbe; ?>
<?php unset($__attributesOriginale38455d25d857368dcfc8129c7994fbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale38455d25d857368dcfc8129c7994fbe)): ?>
<?php $component = $__componentOriginale38455d25d857368dcfc8129c7994fbe; ?>
<?php unset($__componentOriginale38455d25d857368dcfc8129c7994fbe); ?>
<?php endif; ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/contac/index.blade.php ENDPATH**/ ?>