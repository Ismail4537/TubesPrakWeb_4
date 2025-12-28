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

     <?php $__env->slot('title', null, []); ?> <?php echo e(isset($event) ? 'Edit Event' : 'Buat Event Baru'); ?> <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">

        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-xl rounded-2xl border border-gray-200 overflow-hidden">

                <div class="bg-white px-8 py-6 border-b border-gray-100 text-center">
                    <h3 class="text-2xl font-extrabold text-gray-800">
                        <?php echo e(isset($event) ? 'Edit Event' : 'Buat Event'); ?>

                    </h3>
                    <p class="text-gray-500 mt-1 text-sm">
                        <?php echo e(isset($event) ? 'Perbarui detail event kamu.' : 'Isi detail event seru kamu di sini!'); ?>

                    </p>
                </div>


                <form action="<?php echo e(isset($event) ? route('event.update', $event->id) : route('event.store')); ?>"
                    method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>


                    <?php if(isset($event)): ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="text" name="id" value="<?php echo e($event->id); ?>" class="hidden">
                    <?php endif; ?>

                    <div class="p-8 space-y-6">


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Event</label>
                            
                            <input type="text" name="title" value="<?php echo e(old('title', $event->title ?? '')); ?>"
                                placeholder="Contoh: Konser Musik Galau Fest"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi Event</label>
                            <input type="text" name="location" value="<?php echo e(old('location', $event->location ?? '')); ?>"
                                placeholder="Contoh: ICE BSD, Tangerang"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                            <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Waktu Mulai</label>
                                <input type="datetime-local" name="start_date_time"
                                    value="<?php echo e(old('start_date_time', $event->start_date_time ?? '')); ?>"
                                    class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium text-sm">
                                <?php $__errorArgs = ['start_date_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Waktu Selesai</label>
                                <input type="datetime-local" name="end_date_time"
                                    value="<?php echo e(old('end_date_time', $event->end_date_time ?? '')); ?>"
                                    class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium text-sm">
                                <?php $__errorArgs = ['end_date_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kategori Event</label>
                            <select name="category"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium bg-white">
                                <option value="" disabled <?php echo e(!isset($event) ? 'selected' : ''); ?>>Pilih
                                    Kategori...</option>
                                
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"
                                        <?php echo e(old('category', isset($event) && $event->category_id == $category->id) ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Harga Tiket (IDR)</label>
                            <input type="number" name="price" value="<?php echo e(old('price', $event->price ?? '')); ?>"
                                placeholder="0 (kosongkan jika gratis)"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                            <p class="text-xs text-gray-400 mt-1 ml-1">Masukkan angka saja (Contoh: 50000).</p>
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Deskripsi Lengkap</label>
                            <textarea name="description" rows="5" placeholder="Jelaskan detail event..."
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium resize-none"><?php echo e(old('description', $event->description ?? '')); ?></textarea>
                        </div>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Poster / Banner Event</label>

                            <label
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition-all group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-gray-400 group-hover:text-blue-500 transition-colors"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="text-sm text-gray-500 group-hover:text-blue-600 font-semibold">Klik untuk
                                        pilih foto</p>
                                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (Max. 2MB)</p>
                                </div>
                                <input type="file" name="image_path" class="hidden" readonly />
                            </label>
                            <div class="flex space-x-4">
                                <p name="imgPlaceholder" id="imgPlaceholder">No file chosen</p>
                                <?php $__errorArgs = ['image_path'];
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
                        </div>
                        <div>
                            <?php if(isset($event) && $event->status): ?>
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Status event</label>
                            <?php endif; ?>
                            <select name="status"
                                class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium bg-white <?php echo e(isset($event) && $event->status ? '' : 'hidden'); ?>">
                                <option value="scheduled"
                                    <?php echo e(old('status', isset($event) && $event->status ? 'selected' : '')); ?>>Scheduled
                                </option>
                                <option value="ongoing"
                                    <?php echo e(old('status', isset($event) && $event->status == 'ongoing' ? 'selected' : '')); ?>>
                                    Ongoing</option>
                                <option value="completed"
                                    <?php echo e(old('status', isset($event) && $event->status == 'completed' ? 'selected' : '')); ?>>
                                    Completed</option>
                                <option value="cancelled"
                                    <?php echo e(old('status', isset($event) && $event->status == 'cancelled' ? 'selected' : '')); ?>>
                                    Cancelled</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-4 px-8 py-6 border-t border-gray-100 bg-gray-50">
                        <a href="<?php echo e(route('event.index')); ?>" type="button"
                            class="px-6 py-3 rounded-lg text-base font-bold text-gray-500 hover:bg-gray-200 hover:text-gray-900 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-8 py-3 rounded-lg text-base font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-200 transform hover:-translate-y-0.5 transition-all">
                            <?php echo e(isset($event) ? 'Simpan Perubahan' : 'Buat Event Sekarang'); ?>

                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <script>
        const photoInput = document.querySelector('input[name="image_path"]');
        const imgPlaceholder = document.getElementById('imgPlaceholder');

        photoInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                imgPlaceholder.textContent = this.files[0].name;
            } else {
                imgPlaceholder.textContent = 'No file chosen';
            }
        });
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
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/event/form.blade.php ENDPATH**/ ?>