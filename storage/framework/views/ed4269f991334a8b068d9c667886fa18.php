<?php if (isset($component)) { $__componentOriginal9f1bd0e1d04155988af00158efd48dd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f1bd0e1d04155988af00158efd48dd8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-page.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('back-page.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>

<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Event Reporting</h1>
                <p class="text-sm text-gray-500 mt-1">View and export event data reports</p>
            </div>
            <div class="flex gap-3">
                <!-- Button View PDF -->
                <a href="<?php echo e(route('reports.events.pdf.view')); ?>" target="_blank" 
                   class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    View PDF
                </a>
                
                <!-- Button Download PDF -->
                <a href="<?php echo e(route('reports.events.pdf.download')); ?>" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Download PDF
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
            <p class="text-sm text-gray-500 uppercase tracking-wide">Total Events</p>
            <p class="text-2xl font-bold text-gray-900 mt-1"><?php echo e($events->count()); ?></p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
            <p class="text-sm text-gray-500 uppercase tracking-wide">Scheduled</p>
            <p class="text-2xl font-bold text-blue-600 mt-1"><?php echo e($events->where('status', 'scheduled')->count()); ?></p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
            <p class="text-sm text-gray-500 uppercase tracking-wide">Ongoing</p>
            <p class="text-2xl font-bold text-green-600 mt-1"><?php echo e($events->where('status', 'ongoing')->count()); ?></p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
            <p class="text-sm text-gray-500 uppercase tracking-wide">Completed</p>
            <p class="text-2xl font-bold text-purple-600 mt-1"><?php echo e($events->where('status', 'completed')->count()); ?></p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
            <p class="text-sm text-gray-500 uppercase tracking-wide">Cancelled</p>
            <p class="text-2xl font-bold text-red-600 mt-1"><?php echo e($events->where('status', 'cancelled')->count()); ?></p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Creator</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($index + 1); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900"><?php echo e($event->title); ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo e($event->category->name ?? '-'); ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($event->creator->name ?? '-'); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e(\Carbon\Carbon::parse($event->start_date_time)->format('d M Y H:i')); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($event->location); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                            Rp <?php echo e(number_format($event->price, 0, ',', '.')); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php if($event->status === 'scheduled'): ?>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Scheduled
                                </span>
                            <?php elseif($event->status === 'ongoing'): ?>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Ongoing
                                </span>
                            <?php elseif($event->status === 'completed'): ?>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    Completed
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Cancelled
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-500 font-medium">No events found</p>
                                <p class="text-sm text-gray-400 mt-1">There are no events in the database yet.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="mt-6 text-center text-sm text-gray-500">
        <p>Generated on <?php echo e(now()->format('d F Y H:i:s')); ?> | Acarra Event Management System</p>
    </div>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f1bd0e1d04155988af00158efd48dd8)): ?>
<?php $attributes = $__attributesOriginal9f1bd0e1d04155988af00158efd48dd8; ?>
<?php unset($__attributesOriginal9f1bd0e1d04155988af00158efd48dd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f1bd0e1d04155988af00158efd48dd8)): ?>
<?php $component = $__componentOriginal9f1bd0e1d04155988af00158efd48dd8; ?>
<?php unset($__componentOriginal9f1bd0e1d04155988af00158efd48dd8); ?>
<?php endif; ?>
<?php /**PATH C:\HERD\Acarra\resources\views/reports/events-index.blade.php ENDPATH**/ ?>