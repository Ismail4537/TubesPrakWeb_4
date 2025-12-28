@foreach ($contacts as $contact)
    <a href="{{ route('contac.show', ['id' => $contact->id]) }}" class="my-4 shrink-0 w-48 ">
        <div class="p-2 flex flex-col items-center w-full max-w-xs rounded-xl overflow-hidden h-full">
            <img src="{{ asset($contact->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . $contact->name) }}"
                alt="gambar" class="w-35 h-35 rounded-full object-cover mb-4">
            <h2 class="text-md font-medium text-gray-900 text-center">{{ $contact->name }}</h2>
        </div>
    </a>
@endforeach
