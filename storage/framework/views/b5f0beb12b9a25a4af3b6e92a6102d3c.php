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

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 text-center">
                    <div class="relative mx-auto w-32 h-32 mb-4">
                        <img src=
                        <?php if( $user->profile_photo_path != null): ?>
                            <?php echo e(asset('storage/' . $user->profile_photo_path)); ?>

                        <?php else: ?>
                            "https://ui-avatars.com/api/?name=<?php echo e(urlencode($user->name ?? 'User')); ?>&background=random&color=fff&size=128"
                        <?php endif; ?>
                            class="rounded-full w-full h-full object-cover border-4 border-white shadow-lg shadow-indigo-100" alt="Profile">
                    </div>
                    <h2 class="text-xl font-bold text-slate-800"><?php echo e($user->name); ?></h2>
                    <br>

                    <a href="<?php echo e(route('profile.edit')); ?>" class="block w-full py-2 px-4 bg-white border border-indigo-200 text-indigo-600 rounded-lg text-sm font-medium hover:bg-indigo-50 hover:border-indigo-300 transition">
                        Edit profile
                    </a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h3 class="font-bold text-slate-800 mb-4 border-b pb-2">Detail Info User</h3>
                    <div class="space-y-4 text-sm">
                        
                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Email</span>
                            <span class="text-slate-700 font-medium break-all"><?php echo e($user->email); ?></span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">No. Telepon</span>
                            <span class="text-slate-700 font-medium"><?php if($user->phone != null): ?>
                                <?php echo e($user->phone); ?>

                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Tanggal Lahir</span>
                            <span class="text-slate-700 font-medium"><?php if($user->birthdate != null): ?>
                                <?php echo e($user->birthdate); ?>

                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Role / Status</span>
                            <span style="text-transform: uppercase;" class="inline-block px-3 py-1 mt-1 bg-indigo-100 text-indigo-700 text-xs rounded-full font-bold">
                                <?php echo e($user->role); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-3">
                <div class="flex border-b border-slate-200 mb-6 bg-white rounded-t-xl overflow-hidden shadow-sm">
                    <a href=<?php echo e(route('profile')); ?> class=
                    <?php if(Request::url() == route('profile')): ?>
                        "flex-1 px-6 py-4 text-center text-indigo-600 border-b-2 border-indigo-600 font-bold bg-indigo-50/50"
                    <?php else: ?>
                        "flex-1 px-6 py-4 text-center text-slate-500 hover:text-slate-700 hover:bg-slate-50 font-medium transition"
                    <?php endif; ?>
                    >
                        Event yang didaftarkan
                    </a>
                    <a href=<?php echo e(route('profile.creator')); ?> class=
                    <?php if(Request::url() == route('profile.creator')): ?>
                        "flex-1 px-6 py-4 text-center text-indigo-600 border-b-2 border-indigo-600 font-bold bg-indigo-50/50"
                    <?php else: ?>
                        "flex-1 px-6 py-4 text-center text-slate-500 hover:text-slate-700 hover:bg-slate-50 font-medium transition"
                    <?php endif; ?>
                    >
                        Event yang dibuat
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if($listEvent->isEmpty()): ?>
                        <div class="col-span-3 text-center py-10">
                            <p class="text-slate-500">
                                <?php if(Request::url() == route('profile.creator')): ?>
                                    Anda belum membuat event apapun.
                                <?php else: ?>
                                    Anda belum mendaftar pada event apapun.
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $listEvent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href=<?php echo e(route('event.show', ['slug' => $event['slug']])); ?> class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                            <img class="w-full h-40 object-cover" src=
                            <?php if($event['image_path'] != null): ?>
                                <?php echo e(asset($event['image_path'])); ?>

                            <?php else: ?>
                                <?php echo e(asset('Image/Preview.jpg')); ?>

                            <?php endif; ?> alt="Gambar Event">
                            <div class="p-5">
                                <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition"><?php echo e($event['name']); ?></h4>
                                <div class="text-sm text-slate-500 space-y-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl font-semibold text-gray-900 mb-3"><?php echo e($event['title']); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-400">📅</span> <span><?php echo e($event['start_date_time']); ?> / <?php echo e($event['end_date_time']); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-400">📍</span> <span class="truncate"><?php echo e($event['location']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale38455d25d857368dcfc8129c7994fbe)): ?>
<?php $attributes = $__attributesOriginale38455d25d857368dcfc8129c7994fbe; ?>
<?php unset($__attributesOriginale38455d25d857368dcfc8129c7994fbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale38455d25d857368dcfc8129c7994fbe)): ?>
<?php $component = $__componentOriginale38455d25d857368dcfc8129c7994fbe; ?>
<?php unset($__componentOriginale38455d25d857368dcfc8129c7994fbe); ?>
<?php endif; ?><?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/user/profile.blade.php ENDPATH**/ ?>