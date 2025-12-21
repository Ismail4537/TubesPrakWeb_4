<x-front-page.layout>
<x-slot:title> {{$title}} </x-slot:title>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 text-center">
                    <div class="relative mx-auto w-32 h-32 mb-4">
                        <img src=
                        @if ( $user->profile_photo_path != null)
                            {{ asset('storage/' . $user->profile_photo_path) }}
                        @else
                            "https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'User') }}&background=random&color=fff&size=128"
                        @endif
                            class="rounded-full w-full h-full object-cover border-4 border-white shadow-lg shadow-indigo-100" alt="Profile">
                    </div>

                    <h2 class="text-xl font-bold text-slate-800">{{$user->name}}</h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h3 class="font-bold text-slate-800 mb-4 border-b pb-2">Detail Info User</h3>
                    <div class="space-y-4 text-sm">
                        
                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Email</span>
                            <span class="text-slate-700 font-medium break-all">{{ $user->email }}</span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">No. Telepon</span>
                            <span class="text-slate-700 font-medium">@if ($user->phone != null)
                                {{ $user->phone }}
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Tanggal Lahir</span>
                            <span class="text-slate-700 font-medium">@if ($user->birthdate != null)
                                {{ $user->birthdate }}
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>

                        <div>
                            <span class="block text-slate-400 text-xs uppercase tracking-wider">Role / Status</span>
                            <span style="text-transform: uppercase;" class="inline-block px-3 py-1 mt-1 bg-indigo-100 text-indigo-700 text-xs rounded-full font-bold">
                                {{ $user->role }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-3">
                
                <div class="flex border-b border-slate-200 mb-6 bg-white rounded-t-xl overflow-hidden shadow-sm">
                    <a href={{ route('profile') }} class=
                        "flex-1 px-6 py-4 text-center text-indigo-600 border-b-2 border-indigo-600 font-bold bg-indigo-50/50"
                    >
                        Event yang dibuat
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($listEvent->isEmpty())
                        <div class="col-span-3 text-center py-10">
                            <p class="text-slate-500">User ini belum membuat event apapun.</p>
                        </div>
                    @endif
                    @foreach ($listEvent as $event)
                        <a href={{ route('event.show', ['slug' => $event['slug']]) }} class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-indigo-100 transition group cursor-pointer">
                            <img class="w-full h-40 object-cover" src=
                            @if ($event['image_path'] != null)
                                {{ $event['image_path'] }}
                            @else
                                {{ asset('Image/Preview.jpg') }}
                            @endif alt="Gambar Event">
                            <div class="p-5">
                                <h4 class="font-bold text-lg mb-2 text-slate-800 line-clamp-1 group-hover:text-indigo-600 transition">{{ $event['name'] }}</h4>
                                <div class="text-sm text-slate-500 space-y-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl font-semibold text-gray-900 mb-3">{{ $event['title'] }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-400">📅</span> <span>{{ $event['start_date_time'] }} / {{ $event['end_date_time'] }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-400">📍</span> <span class="truncate">{{ $event['location'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    </div>
                    @if($listEvent->hasPages())
    <div class="px-6 py-4 border-t border-gray-208">
        <nav aria-label="Page navigation">
            <ul class="flex-space-x-px text-sm">
                {{-- Previous Button --}}
                @if($listEvent->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-18">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $listEvent->previousPageUrl() }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-s-base text-sm px-3 h-18 focus:outline-none">Previous</a>
                    </li>
                @endif
                {{-- Page Numbers --}}
                @foreach($listEvent->getUrlRange (1, $listEvent->lastPage()) as $page => $url)
                    @if($page == $listEvent->currentPage())
                        <li>
                            <a href="{{ $url}}" aria-current="page" class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover: text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium text-sm w-18 h-18 focus: outline-none"> {{ $page }}</a>
                        </li>
                    @endif
                @endforeach
                {{-- Next Button --}}
                @if($listEvent->hasMorePages())
                    <li>
                        <a href="{{ $listEvent->nextPageUrl() }}" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-e-base text-sm px-3 h-18 focus:outline-none">Next</a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-16">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
            </div>
        </div>
    </div>
</x-front-page.layout>
<script src="BASEURL"></script>