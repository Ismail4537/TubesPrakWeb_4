
<div class="max-w-lg mx-auto bg-neutral-primary-soft p-6 rounded-base shadow border border-default">

    <h2 class="text-lg font-semibold mb-4">Update Category</h2>

    <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Category</label>
            <input
                type="text"
                name="name"
                value="<?php echo e(old('name', $category->name)); ?>"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand"
                required
            >

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

        <!-- Button -->
        <div class="flex justify-end gap-2">
            <a href="<?php echo e(route('categories.index')); ?>"
               class="px-4 py-2 border rounded-base text-sm">
                Batal
            </a>

            <button
                type="submit"
                class="px-4 py-2 bg-brand text-black rounded-base hover:bg-brand-dark text-sm">
                Update
            </button>
        </div>
    </form>

</div>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/dashboard/categories/edit.blade.php ENDPATH**/ ?>