<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('event.show', ['slug' => $event['slug']])); ?>">
        <div
            class="border border-gray-300 w-full max-w-xs bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">

            <div class="relative h-32 sm:h-42">
                <img src="<?php echo e($event['image_path'] ? asset('storage/' . $event['image_path']) : asset('Image/Preview.jpg')); ?>"
                    class="w-full h-full object-cover" alt="<?php echo e($event['title']); ?>">
            </div>

            <div class="px-4 py-5 pt-3 grow flex flex-col">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">
                    <?php echo e($event['title']); ?>

                </h2>
                <div class="space-y-2 text-gray-600 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 6h.008v.008H6V6z"></path>
                        </svg>
                        <span><?php echo e($event->category->name); ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span><?php echo e($event['start_date_time']); ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span><?php echo e($event['location']); ?></span>
                    </div>

                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>
                            <?php if($event['price'] == 0): ?>
                                FREE
                            <?php else: ?>
                                Rp,<?php echo e(number_format($event['price'], 0, ',', '.')); ?>,-
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/event/partials/cards.blade.php ENDPATH**/ ?>