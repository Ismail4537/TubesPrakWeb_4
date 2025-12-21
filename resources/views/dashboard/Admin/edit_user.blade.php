<div class="max-w-lg mx-auto bg-neutral-primary-soft p-6 rounded-base shadow border border-default">

    <h2 class="text-lg font-semibold mb-4">Update User</h2>

    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand"
                required>

            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand"
                required>

            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand">
        </div>

        <!-- Date of birth -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
            <input type="date" name="date_of_birth"
                value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}"
                class="w-full px-3 py-2 border border-default-medium rounded-base
                       focus:ring-brand focus:border-brand">
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-2">
            <a href="{{ route('dashboard.users.index') }}" class="px-4 py-2 border rounded-base text-sm">
                Batal
            </a>

            <button type="submit" class="px-4 py-2 bg-brand text-black rounded-base hover:bg-brand-dark text-sm">
                Update
            </button>
        </div>
    </form>

</div>
