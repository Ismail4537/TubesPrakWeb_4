<x-front-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="container mx-auto py-10 px-4">
        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">

            <h2 class="text-2xl font-semibold mb-2">
                Pembayaran Berhasil
            </h2>

            <p class="text-gray-700 mb-6">
                <span class="font-medium">Event:</span>
                {{ $event->title }}
            </p>
            <p class="text-gray-600 mb-6">
                <span class="font-medium">Order ID:</span> {{ $orderId }}
            </p>

            <p class="text-green-700 mb-6">Anda berhasil membeli tiket.</p>
            <div class="flex gap-3">
                <a href="{{ route('event.show', ['slug' => $event->slug]) }}"
                    class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">
                    Kembali ke Event
                </a>
            </div>
        </div>
    </div>
</x-front-page.layout>
