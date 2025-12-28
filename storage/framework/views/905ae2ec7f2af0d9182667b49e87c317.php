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
    <?php
        // Mempermudah akses data event
        $event = $detail;
    ?>
    <div class="container mx-auto max-w-6xl px-4 py-6">
        <div class="text-sm text-gray-500 mb-6">
            <a href="<?php echo e(route('event.index')); ?>"
                class="hover:text-gray-700 hidden lg:flex items-center space-x-2 text-[20px] font-semibold">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <p>Back</p>
            </a>
        </div>
        <?php if(Auth::user()->id == $event->creator_id): ?>
            <a href="<?php echo e(route('event.edit', ['id' => $event->id])); ?>">Edit Event</a>
            <form action="<?php echo e(route('event.destroy', ['id' => $event->id])); ?>" method="POST"
                onsubmit="return confirm('Apakah anda yakin ingin hapus event ini?');" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-red-600 hover:text-red-800 ml-4">Delete Event</button>
            </form>
        <?php endif; ?>
        <?php if(Auth::user()->id != $event->creator_id && $isRegistered): ?>
            <form action="<?php echo e(route('event.resign', ['id' => $event->id])); ?>" method="POST"
                onsubmit="return confirm('Apakah anda yakin ingin membatalkan pendaftaran dari event ini?');"
                style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-red-600 hover:text-red-800 ml-4">Resign from Event</button>
            </form>
        <?php endif; ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="space-y-4 lg:col-start-3">
                <div class="relative w-full h-auto rounded-lg overflow-hidden shadow-xl">
                    <?php if($event['image_path'] != null): ?>
                        <img src="<?php echo e(asset($event['image_path'])); ?>" alt="<?php echo e($event['title']); ?>"
                            class="w-full h-full object-cover">
                    <?php else: ?>
                        <img src="<?php echo e(asset('Image/Preview.jpg')); ?>" alt="<?php echo e($event['title']); ?>"
                            class="w-full h-full object-cover">
                    <?php endif; ?>
                    <div class="lg:col-start-3">
                        <div class="flex border border-gray-200 rounded-lg overflow-hidden shadow-md">
                            <div class="w-1/2 flex items-center justify-center py-3 px-2 text-gray-600">
                                <?php if($event['price'] == 0): ?>
                                    FREE
                                <?php else: ?>
                                    Rp,<?php echo e(number_format($event['price'], 0, ',', '.')); ?>,-
                                <?php endif; ?>
                            </div>
                            <?php
                                $isRegistered = Auth::check() && $allRegistrants->contains('user_id', Auth::id());
                            ?>
                            <?php if($event['status'] != 'scheduled'): ?>
                                <span
                                    class="w-1/2 bg-gray-300 text-gray-700 font-bold py-3 px-2 text-center select-none">
                                    Event tidak lagi tersedia
                                </span>
                            <?php else: ?>
                                <?php if($event->creator_id == Auth::user()->id): ?>
                                    <span
                                        class="w-1/2 bg-gray-300 text-gray-700 font-bold py-3 px-2 text-center select-none">
                                        Anda adalah pembuat event ini
                                    </span>
                                <?php else: ?>
                                    <?php if($isRegistered): ?>
                                        <span
                                            class="w-1/2 bg-gray-300 text-gray-700 font-bold py-3 px-2 text-center select-none">
                                            Anda sudah terdaftar
                                        </span>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('payment.show', ['event' => $event->id])); ?>"
                                            class="w-1/2 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-2 transition text-center">
                                            Beli Tiket
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1">
                <h1 class="text-4xl font-bold text-gray-900 mb-1">
                    <?php echo e($event['title']); ?>

                </h1>
                <p class="text-lg text-gray-600 mb-6">
                    <a href="<?php echo e(route('contac.show', ['id' => $event->creator->id])); ?>">
                        By <?php echo e($event->creator->name); ?>

                    </a>
                </p>
                <div class="space-y-4 mb-8">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-gray-500 mr-3 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-600"><?php echo e($event['location']); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="font-semibold"><?php echo e($event['start_date_time']); ?> /
                            <?php echo e($event['end_date_time']); ?></span>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 border-b pb-2">
                    Tentang experience ini
                </h2>
                <div class="text-gray-700 space-y-4">
                    <p>
                        <?php echo e($event['description']); ?>

                    </p>
                </div>
                <div class="mt-6">
                    <span
                        class="inline-block bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded-full"><?php echo e($event->category->name); ?></span>
                </div>
                <br>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 border-b pb-2">
                    Yang mengikuti event ini
                </h2>
                <div class="text-gray-700 space-y-4">
                    <?php if($registrants->isEmpty()): ?>
                        <p>Belum ada yang mendaftar untuk event ini.</p>
                    <?php else: ?>
                        <?php if($event->creator_id == Auth::user()->id || Auth::user()->role == 'admin'): ?>
                            <a href="<?php echo e(route('event.registrants.index', ['event' => $event->id])); ?>"
                                class="text-blue-500">Lihat detail pendaftar</a>
                            <p></p>
                        <?php endif; ?>
                        <div class="flex gap-5 items-center">
                            <?php $__currentLoopData = $registrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registrant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <img src="<?php echo e(asset($registrant->user->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . $registrant->user->name)); ?>"
                                        alt=""
                                        class="w-10 h-10 rounded-full flex items-center justify-center font-bold">
                                    <?php echo e($registrant->user->name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($registrantsCount > $registrants->count()): ?>
                                dan <?php echo e($registrantsCount - $registrants->count()); ?> lainnya...
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/event/show.blade.php ENDPATH**/ ?>