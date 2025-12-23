<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
        <td class="px-6 py-4 text-center"><?php echo e($index + 1); ?></td>
        <td class="px-6 py-4"><?php echo e($user->name); ?></td>
        <td class="px-6 py-4"><?php echo e($user->email); ?></td>
        <td class="px-6 py-4"><?php echo e($user->phone ?? '-'); ?></td>
        <td class="px-6 py-4">
            <?php echo e($user->date_of_birth ? $user->date_of_birth->format('d/m/Y') : '-'); ?>

        </td>
        <td class="px-6 py-4"><?php echo e($user->profile_photo_path ?? '-'); ?></td>
        <td class="px-6 py-4"><?php echo e($user->role ?? 'User'); ?></td>
        <td class="px-6 py-4 text-center">
            <a href="<?php echo e(route('dashboard.users.edit', $user->id)); ?>" class="text-brand font-medium hover:underline mr-4">
                Update
            </a>

            <form action="<?php echo e(route('dashboard.users.destroy', $user->id)); ?>" method="POST" class="inline"
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
        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
            Tidak ada data pengguna.
        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/dashboard/Admin/_users_rows.blade.php ENDPATH**/ ?>