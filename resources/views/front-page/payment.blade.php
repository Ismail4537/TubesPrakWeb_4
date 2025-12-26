<x-front-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="container mx-auto py-8">
        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">
            <h2 class="text-2xl font-semibold mb-4">Pembayaran Event</h2>

            <div class="space-y-2 mb-6">
                <p><span class="font-medium">Event:</span> {{ $event->title }}</p>
                <p><span class="font-medium">Pendaftar:</span> {{ $user->name ?? 'Guest' }}</p>
                <p><span class="font-medium">Harga:</span> Rp {{ number_format($amount, 0, ',', '.') }}</p>
            </div>

            <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
            <button id="pay-button" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Bayar Sekarang
            </button>

            <div id="status" class="mt-4 text-sm"></div>
        </div>
    </div>

    @php
        $snapJs = $isProduction
            ? 'https://app.midtrans.com/snap/snap.js'
            : 'https://app.sandbox.midtrans.com/snap/snap.js';
    @endphp
    <script src="{{ $snapJs }}" data-client-key="{{ $clientKey }}"></script>

    <script>
        const payBtn = document.getElementById('pay-button');
        const statusEl = document.getElementById('status');
        const amount = {{ (int) $amount }};
        const createUrl = "{{ route('payment.create', ['event' => $event->id]) }}";
        const resultBaseUrl = "{{ route('payment.result', ['event' => $event->id]) }}";

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
</x-front-page.layout>
