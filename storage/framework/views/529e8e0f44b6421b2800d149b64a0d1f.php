<?php ($p = $paginator); ?>
<?php if($p->hasPages()): ?>
    <div class="px-6 py-4 border-t border-gray-200">
        <nav aria-label="Page navigation" class="flex justify-end">
            <ul class="flex space-x-px text-sm">
                <?php if($p->onFirstPage()): ?>
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed font-medium rounded-l text-sm px-3 h-10">Previous</span>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e($p->previousPageUrl()); ?>"
                            class="flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 font-medium rounded-l text-sm px-3 h-10 focus:outline-none">Previous</a>
                    </li>
                <?php endif; ?>

                <?php $__currentLoopData = $p->getUrlRange(1, $p->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $p->currentPage()): ?>
                        <li>
                            <a href="<?php echo e($url); ?>" aria-current="page"
                                class="flex items-center justify-center text-blue-600 bg-blue-50 border border-gray-300 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none"><?php echo e($page); ?></a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e($url); ?>"
                                class="flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 font-medium text-sm w-10 h-10 focus:outline-none"><?php echo e($page); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($p->hasMorePages()): ?>
                    <li>
                        <a href="<?php echo e($p->nextPageUrl()); ?>"
                            class="flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 font-medium rounded-r text-sm px-3 h-10 focus:outline-none">Next</a>
                    </li>
                <?php else: ?>
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed font-medium rounded-r text-sm px-3 h-10">Next</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/event/partials/pagination.blade.php ENDPATH**/ ?>