<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard - <?php echo e($title); ?></title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>

</head>

<body>
    <div class="min-h-screen bg-gray-100 flex" x-data="{ sidebarOpen: true, activeMenu: '<?php echo e($title); ?>' }">        
        <?php if (isset($component)) { $__componentOriginal4304550f494574c7faa24c18b4147ea7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4304550f494574c7faa24c18b4147ea7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-page.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('back-page.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4304550f494574c7faa24c18b4147ea7)): ?>
<?php $attributes = $__attributesOriginal4304550f494574c7faa24c18b4147ea7; ?>
<?php unset($__attributesOriginal4304550f494574c7faa24c18b4147ea7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4304550f494574c7faa24c18b4147ea7)): ?>
<?php $component = $__componentOriginal4304550f494574c7faa24c18b4147ea7; ?>
<?php unset($__componentOriginal4304550f494574c7faa24c18b4147ea7); ?>
<?php endif; ?>

        <main class="flex-1 flex flex-col">
            <?php if (isset($component)) { $__componentOriginal22b8bd1dcb5917d30cf2f01ab0f45deb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22b8bd1dcb5917d30cf2f01ab0f45deb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-page.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('back-page.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo e($title); ?>  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22b8bd1dcb5917d30cf2f01ab0f45deb)): ?>
<?php $attributes = $__attributesOriginal22b8bd1dcb5917d30cf2f01ab0f45deb; ?>
<?php unset($__attributesOriginal22b8bd1dcb5917d30cf2f01ab0f45deb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22b8bd1dcb5917d30cf2f01ab0f45deb)): ?>
<?php $component = $__componentOriginal22b8bd1dcb5917d30cf2f01ab0f45deb; ?>
<?php unset($__componentOriginal22b8bd1dcb5917d30cf2f01ab0f45deb); ?>
<?php endif; ?>
            <div class="p-8">
                    <?php echo e($slot); ?>

            </div>
        </main>
    </div>
</body>

</html><?php /**PATH C:\HERD\Acarra\resources\views/components/back-page/layout.blade.php ENDPATH**/ ?>