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

    <div class="container mx-auto py-8">
        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">
            <h2 class="text-2xl font-semibold mb-4">Pembayaran Event</h2>

            <div class="space-y-2 mb-6">
                <p><span class="font-medium">Event:</span> <?php echo e($event->title); ?></p>
                <p><span class="font-medium">Pendaftar:</span> <?php echo e($user->name ?? 'Guest'); ?></p>
                <p><span class="font-medium">Harga:</span> Rp <?php echo e(number_format($amount, 0, ',', '.')); ?></p>
            </div>

            <input type="hidden" id="csrf-token" value="<?php echo e(csrf_token()); ?>">
            <button id="pay-button" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Bayar Sekarang
            </button>

            <div id="status" class="mt-4 text-sm"></div>
        </div>
    </div>

    <?php
        $snapJs = $isProduction
            ? 'https://app.midtrans.com/snap/snap.js'
            : 'https://app.sandbox.midtrans.com/snap/snap.js';
    ?>
    <script src="<?php echo e($snapJs); ?>" data-client-key="<?php echo e($clientKey); ?>"></script>

    <script>
        const payBtn = document.getElementById('pay-button');
        const statusEl = document.getElementById('status');
        const amount = <?php echo e((int) $amount); ?>;
        const createUrl = "<?php echo e(route('payment.create', ['event' => $event->id])); ?>";
        const resultBaseUrl = "<?php echo e(route('payment.result', ['event' => $event->id])); ?>";

        function setStatus(msg, type = 'info') {
            statusEl.textContent = msg;
            statusEl.className = 'mt-4 text-sm ' + (type === 'error' ? 'text-red-600' : type === 'success' ?
                'text-green-600' : 'text-gray-700');
        }

        payBtn.addEventListener('click', async () => {
            setStatus('Membuat transaksi...');
            try {
                if (amount === 0) {
                    // Free event: register directly
                    const resFree = await fetch(createUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.getElementById('csrf-token').value,
                        },
                        body: JSON.stringify({
                            amount: 0
                        })
                    });
                    if (!resFree.ok) {
                        const err = await resFree.json().catch(() => ({}));
                        throw new Error(err.message || 'Gagal mendaftar gratis');
                    }
                    setStatus('Pendaftaran berhasil. Anda sudah terdaftar.', 'success');
                    setTimeout(() => {
                        window.location.href = resultBaseUrl + '?status=success';
                    }, 800);
                    return;
                }

                const res = await fetch(createUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.getElementById('csrf-token').value,
                    },
                    body: JSON.stringify({
                        amount
                    })
                });
                if (!res.ok) {
                    const err = await res.json().catch(() => ({}));
                    throw new Error(err.message || 'Gagal membuat transaksi');
                }
                const data = await res.json();
                if (!data.token) {
                    throw new Error('Token Snap tidak tersedia');
                }

                const createdOrderId = data.order_id || '';

                window.snap.pay(data.token, {
                    onSuccess: function(result) {
                        setStatus('Pembayaran berhasil. Terima kasih!', 'success');
                        setTimeout(() => {
                            const orderId = (result && result.order_id ? result.order_id :
                                createdOrderId) || '';
                            const qs = 'status=success' + (orderId ? ('&order_id=' +
                                encodeURIComponent(orderId)) : '');
                            window.location.href = resultBaseUrl + '?' + qs;
                        }, 800);
                    },
                    onPending: function(result) {
                        setStatus('Pembayaran pending. Silakan selesaikan.', 'info');
                        setTimeout(() => {
                            const orderId = (result && result.order_id ? result.order_id :
                                createdOrderId) || '';
                            const qs = 'status=pending' + (orderId ? ('&order_id=' +
                                encodeURIComponent(orderId)) : '');
                            window.location.href = resultBaseUrl + '?' + qs;
                        }, 800);
                    },
                    onError: function(result) {
                        console.error(result);
                        setStatus('Terjadi kesalahan pembayaran.', 'error');
                        setTimeout(() => {
                            const orderId = (result && result.order_id ? result.order_id :
                                createdOrderId) || '';
                            const qs = 'status=failed' + (orderId ? ('&order_id=' +
                                encodeURIComponent(orderId)) : '');
                            window.location.href = resultBaseUrl + '?' + qs;
                        }, 800);
                    },
                    onClose: function() {
                        setStatus('Anda menutup popup tanpa menyelesaikan pembayaran.', 'info');
                        setTimeout(() => {
                            window.location.href = resultBaseUrl + '?status=failed';
                        }, 800);
                    }
                });
            } catch (e) {
                setStatus(e.message, 'error');
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
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/payment.blade.php ENDPATH**/ ?>