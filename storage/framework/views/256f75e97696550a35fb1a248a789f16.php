<form action="<?php echo e(route('categories.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <input type="text" name="name" placeholder="Nama kategori" class="border p-2 rounded w-full mb-4">

    <button type="submit" class="px-4 py-2 bg-brand text-white rounded">
        Simpan
    </button>
</form>
<?php /**PATH C:\laragon\www\Acarra\resources\views/dashboard/categories/create.blade.php ENDPATH**/ ?>