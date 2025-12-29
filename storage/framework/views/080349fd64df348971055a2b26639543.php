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
     <?php $__env->slot('title', null, []); ?> Edit Profile <?php $__env->endSlot(); ?>
    <div class="flex items-center justify-center min-h-[80vh] py-12">
        <div class="w-full max-w-xl">
            <div class="bg-white shadow-xl rounded-2xl border border-gray-200 overflow-hidden">
                <div class="bg-white px-8 py-6 border-b border-gray-100 text-center">
                    <h3 class="text-2xl font-extrabold text-gray-800">Edit Profile</h3>
                    <p class="text-gray-500 mt-1 text-sm">Update data diri Anda di bawah ini.</p>
                </div>

                <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div>
                        <div
                            class="w-full bg-gray-50 border-b border-gray-200 p-8 flex flex-col items-center text-center justify-center">

                            <div class="relative mb-4 shrink-0">
                                <?php if(!empty($user->profile_photo_path)): ?>
                                    <img src="<?php echo e(asset('storage/' . $user->profile_photo_path)); ?>"
                                        class="h-40 w-40 object-cover rounded-full border-4 border-white shadow-lg bg-gray-200">
                                <?php else: ?>
                                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($user->name ?? 'User')); ?>&background=random&color=fff&size=128"
                                        alt="Profile Placeholder"
                                        class="h-40 w-40 object-cover rounded-full border-4 border-white shadow-lg">
                                <?php endif; ?>
                            </div>

                            <h4 class="font-bold text-gray-800 text-xl"><?php echo e(old('name', $user->name) ?? 'Nama User'); ?>

                            </h4>
                            <p class="text-sm text-gray-500"><?php echo e(old('email', $user->email) ?? 'email@example.com'); ?></p>
                        </div>

                        <div class="w-full p-8 bg-white">

                            <div class="space-y-6">

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama</label>
                                    <input type="text" name="name" value="<?php echo e(old('name', $user->name) ?? ''); ?>"
                                        class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
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

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Alamat Email</label>
                                    <input type="email" name="email" value="<?php echo e(old('email', $user->email) ?? ''); ?>"
                                        class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
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

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">No Telp</label>
                                    <input type="text" name="phone" value="<?php echo e(old('phone', $user->phone) ?? ''); ?>"
                                        class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                                    <?php $__errorArgs = ['phone'];
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

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tanggal Lahir</label>
                                    <input type="date" name="birthdate"
                                        value="<?php echo e(old('birthdate', $user->birthdate) ?? ''); ?>"
                                        class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Password Lama</label>
                                    <input type="password" name="current_password" autocomplete="current-password"
                                        placeholder="Wajib diisi jika ingin ganti password"
                                        class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                                    <?php $__errorArgs = ['current_password'];
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

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Password
                                            Baru</label>
                                        <input type="password" name="password" autocomplete="new-password"
                                            placeholder="Kosongkan jika tidak ingin mengubah"
                                            class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                                        <p class="text-xs text-gray-500 mt-1 ml-1">Kosongkan jika password tidak ingin
                                            diubah.</p>
                                        <?php $__errorArgs = ['password'];
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

                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Konfirmasi
                                            Password</label>
                                        <input type="password" name="password_confirmation" autocomplete="new-password"
                                            placeholder="Ulangi password baru"
                                            class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all shadow-sm font-medium">
                                        <?php $__errorArgs = ['password_confirmation'];
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
                                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Ganti Foto
                                        Profil</label>

                                    <label
                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition-all group">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-gray-400 group-hover:text-blue-500 transition-colors"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="text-sm text-gray-500 group-hover:text-blue-600 font-semibold">
                                                Klik untuk pilih foto</p>
                                            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (Max. 2MB)</p>
                                        </div>
                                        <input type="file" name="photo" class="hidden" readonly />
                                    </label>
                                    <div class="flex space-x-4">
                                        <p name="imgPlaceholder" id="imgPlaceholder">No file chosen</p>
                                        <?php $__errorArgs = ['photo'];
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
                                    <label for="remove_photo" class="text-sm text-gray-600">Hapus foto profil saat ini
                                        <input type="checkbox" name="remove_photo" id="remove_photo" class="mt-2"
                                            value="on"></label>
                                </div>
                            </div>

                            <div class="flex items-center justify-end gap-4 mt-10 pt-6 border-t border-gray-100">
                                <a href="<?php echo e(route('profile')); ?>" type="button"
                                    class="px-6 py-3 rounded-lg text-base font-bold text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="px-6 py-3 rounded-lg text-base font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-200 transform hover:-translate-y-0.5 transition-all">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        const photoInput = document.querySelector('input[name="photo"]');
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
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/user/edit.blade.php ENDPATH**/ ?>