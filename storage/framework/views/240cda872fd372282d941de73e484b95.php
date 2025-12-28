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

    <div class="container mx-auto py-10 px-4">
        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">

            <h2 class="text-2xl font-semibold mb-2">
                Pembayaran Berhasil
            </h2>

            <p class="text-gray-700 mb-6">
                <span class="font-medium">Event:</span>
                <?php echo e($event->title); ?>

            </p>
            <p class="text-gray-600 mb-6">
                <span class="font-medium">Order ID:</span> <?php echo e($orderId); ?>

            </p>

            <p class="text-green-700 mb-6">Anda berhasil membeli tiket.</p>
            <div class="flex gap-3">
                <a href="<?php echo e(route('event.show', ['slug' => $event->slug])); ?>"
                    class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">
                    Kembali ke Event
                </a>
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
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/payment/result.blade.php ENDPATH**/ ?>