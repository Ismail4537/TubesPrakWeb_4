<div class="max-w-lg mx-auto bg-neutral-primary-soft p-6 rounded-base shadow border border-default">

    <h2 class="text-lg font-semibold mb-4">Update User</h2>

    <form action="<?php echo e(route('dashboard.users.update', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand"
                required>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand"
                required>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand">
        </div>

        <!-- Date of birth -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
            <input type="date" name="date_of_birth"
                value="<?php echo e(old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '')); ?>"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand">
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-2">
            <a href="<?php echo e(route('dashboard.users.index')); ?>" class="px-4 py-2 border rounded-base text-sm">
                Batal
            </a>

            <button type="submit" class="px-4 py-2 bg-brand text-black rounded-base hover:bg-brand-dark text-sm">
                Update
            </button>
        </div>
    </form>

</div>
<?php /**PATH C:\laragon\www\Acarra\resources\views/dashboard/Admin/edit_user.blade.php ENDPATH**/ ?>