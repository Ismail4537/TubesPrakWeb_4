<x-front-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="container mx-auto py-10 px-4">
        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">
            @php
                $isSuccess = $status === 'success';
                $isPending = $status === 'pending';
                $isFailed = $status === 'failed';
            @endphp

            <h2 class="text-2xl font-semibold mb-2">
                @if ($isSuccess)
                    Pembayaran Berhasil
                @elseif ($isPending)
                    Pembayaran Pending
                @else
                    Pembayaran Gagal
                @endif
            </h2>

            <p class="text-gray-700 mb-6">
                <span class="font-medium">Event:</span> {{ $event->title }}
            </p>

            @if ($orderId)
                <p class="text-gray-600 mb-6">
                    <span class="font-medium">Order ID:</span> {{ $orderId }}
                </p>
            @endif

            @if ($isSuccess)
                <p class="text-green-700 mb-6">Anda berhasil membeli tiket. Jika tombol masih belum berubah, coba refresh
                    halaman event setelah beberapa detik.</p>
            @elseif ($isPending)
                <p class="text-gray-700 mb-6">Pembayaran Anda masih pending. Silakan selesaikan pembayaran di metode yang
                    Anda pilih.</p>
            @else
                <p class="text-red-700 mb-6">Pembayaran gagal atau dibatalkan. Anda bisa mencoba lagi.</p>
            @endif

            <div class="flex gap-3">
                <a href="{{ route('event.show', ['slug' => $event->slug]) }}"
                    class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">
                    Kembali ke Event
                </a>

                @if (!$isSuccess)
                    <a href="{{ route('payment.show', ['event' => $event->id]) }}"
                        class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
                        Coba Bayar Lagi
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-front-page.layout>
