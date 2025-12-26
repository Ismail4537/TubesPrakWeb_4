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
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-10 lg:py-20">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 sm:text-5xl md:text-6xl tracking-tight mb-6">
                    Lorem ipsum dolor <br>
                    <span class="text-indigo-600">sit amet consectetur.</span>
                </h1>
                <p class="text-lg text-slate-500 mb-8 leading-relaxed">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" 
                     alt="Concert Crowd" 
                     class="w-full h-auto object-cover rounded-3xl shadow-2xl rotate-1 hover:rotate-0 transition duration-500">
            </div>
        </div>
    </div>
    <div class="bg-slate-50 py-20 mt-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Our Mission</h2>
                <p class="mt-2 text-3xl font-extrabold text-slate-900">Excepteur sint occaecat cupidatat</p>
                <p class="mt-4 text-xl text-slate-500">
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <span class="text-indigo-600 font-bold text-xl">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Lorem Ipsum</h3>
                    <p class="text-slate-500">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <span class="text-indigo-600 font-bold text-xl">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Dolor Sit Amet</h3>
                    <p class="text-slate-500">Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <span class="text-indigo-600 font-bold text-xl">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Consectetur</h3>
                    <p class="text-slate-500">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
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
<?php endif; ?><?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/about.blade.php ENDPATH**/ ?>