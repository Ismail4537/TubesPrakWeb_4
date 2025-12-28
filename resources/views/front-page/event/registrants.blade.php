<x-front-page.layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="container mx-auto max-w-6xl px-4 py-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Daftar Pendaftar</h1>
                <p class="text-sm text-gray-600">Event: <span class="font-semibold">{{ $event->title }}</span></p>
            </div>
            <a href="{{ route('event.show', ['slug' => \Illuminate\Support\Str::slug($event->title)]) }}"
                class="text-gray-600 hover:text-gray-900">
                Kembali ke detail event
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <p class="text-sm text-gray-700">Total: <span class="font-semibold">{{ $registrants->count() }}</span>
                </p>
            </div>

            @if ($registrants->isEmpty())
                <div class="p-6 text-gray-600">Belum ada pendaftar untuk event ini.</div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Terdaftar</th>
                                <th
                                    class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($registrants as $registrant)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900">
                                        <a href="{{ route('contac.show', ['id' => $registrant->user->id]) }}">
                                            {{ $registrant->user?->name ?? 'Unknown' }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        {{ $registrant->user?->email ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        {{ optional($registrant->created_at)->format('d M Y, H:i') }}
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        @if ($registrant->user)
                                            <form
                                                action="{{ route('event.registrants.destroy', ['event' => $event->id, 'user' => $registrant->user->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Hapus pendaftar ini dari event?');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                                    Kick dari Event
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-sm text-gray-400">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-front-page.layout>
