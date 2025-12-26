<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acarra - <?php echo e($title); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body>
   
<div class="min-h-full">
<?php if (isset($component)) { $__componentOriginalcf3ec6860ebcf636eff52e36cbe79971 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf3ec6860ebcf636eff52e36cbe79971 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-page.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('front-page.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf3ec6860ebcf636eff52e36cbe79971)): ?>
<?php $attributes = $__attributesOriginalcf3ec6860ebcf636eff52e36cbe79971; ?>
<?php unset($__attributesOriginalcf3ec6860ebcf636eff52e36cbe79971); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf3ec6860ebcf636eff52e36cbe79971)): ?>
<?php $component = $__componentOriginalcf3ec6860ebcf636eff52e36cbe79971; ?>
<?php unset($__componentOriginalcf3ec6860ebcf636eff52e36cbe79971); ?>
<?php endif; ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <?php echo e($slot); ?>

    </div>
  </main>

  <?php if (isset($component)) { $__componentOriginalbabe7084cefe1db4ca417080752e2fd2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbabe7084cefe1db4ca417080752e2fd2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-page.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('front-page.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbabe7084cefe1db4ca417080752e2fd2)): ?>
<?php $attributes = $__attributesOriginalbabe7084cefe1db4ca417080752e2fd2; ?>
<?php unset($__attributesOriginalbabe7084cefe1db4ca417080752e2fd2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbabe7084cefe1db4ca417080752e2fd2)): ?>
<?php $component = $__componentOriginalbabe7084cefe1db4ca417080752e2fd2; ?>
<?php unset($__componentOriginalbabe7084cefe1db4ca417080752e2fd2); ?>
<?php endif; ?>
</div>

</body>

</html><?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/components/front-page/layout.blade.php ENDPATH**/ ?>