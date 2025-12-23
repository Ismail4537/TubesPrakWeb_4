<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
        <td class="px-6 py-4 text-center"><?php echo e($index + 1); ?></td>
        <td class="px-6 py-4"><?php echo e($category->name); ?></td>
        <td class="px-6 py-4 text-center">
            <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="text-brand font-medium hover:underline mr-4">
                Update
            </a>

            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" class="inline"
                onsubmit="return confirm('Yakin hapus?')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-red-600 font-medium hover:underline">
                    Delete
                </button>
            </form>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
            Data category tidak ditemukan
        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/dashboard/categories/_categories_rows.blade.php ENDPATH**/ ?>