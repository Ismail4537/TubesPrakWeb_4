@forelse ($events as $index => $event)
    <tr class="hover:bg-gray-50 transition">
        <td class="px-6 py-4 text-gray-600">{{ $index + 1 }}</td>
        <td class="px-6 py-4 font-medium text-gray-900">{{ $event->title }}</td>
        <td class="px-6 py-4 text-gray-600">{{ $event->category->name ?? '-' }}</td>
        <td class="px-6 py-4">
            @php
                $status = strtolower($event['status'] ?? 'draft');
                $statusClasses = [
                    'scheduled' => 'bg-blue-100 text-blue-700',
                    'ongoing' => 'bg-green-100 text-green-700',
                    'completed' => 'bg-yellow-100 text-yellow-700',
                    'cancelled' => 'bg-red-100 text-red-700',
                ];
                $currentClass = $statusClasses[$status] ?? 'bg-blue-100 text-blue-700';
            @endphp
            <span class="px-2 py-1 {{ $currentClass }} rounded-full text-[10px] font-bold uppercase">
                {{ $event['status'] ?? 'Draft' }}
            </span>
        </td>
        <td class="px-6 py-4 text-center">
            <div class="flex justify-center gap-3">
                <a href="{{ route('dashboard.events.edit', $event->id) }}"
                    class="text-blue-500 font-medium hover:underline">Edit</a>

                <form action="{{ route('dashboard.events.destroy', $event->id) }}" method="POST"
                    onsubmit="return confirm('Hapus event ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
            Tidak ada event ditemukan
        </td>
    </tr>
@endforelse
