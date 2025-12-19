<x-front-page.layout>
<x-slot:title> {{$title}} </x-slot:title>
@php
    // Mempermudah akses data event
    $event = $detail; 
@endphp
<div class="container mx-auto max-w-6xl px-4 py-6">
    <div class="text-sm text-gray-500 mb-6">
        <a href="{{ route('event.index') }}" class="hover:text-gray-700 hidden lg:flex items-center space-x-2 text-[20px] font-semibold">
            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            <p>Back</p>
        </a> 
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="space-y-4 lg:col-start-3">
            <div class="relative w-full h-auto rounded-lg overflow-hidden shadow-xl">
                @if ($event['image_path'] != null)
                    <img src="{{ $event['image_path'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('Image/Preview.jpg') }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover">
                @endif
                 <div class="lg:col-start-3">
                    <div class="flex border border-gray-200 rounded-lg overflow-hidden shadow-md">
                        <div class="w-1/2 flex items-center justify-center py-3 px-2 text-gray-600">
                            @if ($event['price'] == 0)
                                FREE
                            @else
                                {{ $event['price'] }}
                            @endif
                        </div>
                        <button class="w-1/2 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-2 transition">
                            Beli Tiket
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1">
            <h1 class="text-4xl font-bold text-gray-900 mb-1">
                {{ $event['title'] }}
            </h1>
            <p class="text-lg text-gray-600 mb-6">
                <a href="{{ route('contac.show', ['id' => $event->creator->id]) }}">
                    By {{ $event->creator->name }}
                </a>
            </p>
            <div class="space-y-4 mb-8">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-gray-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div>
                        <p class="text-sm text-gray-600">{{ $event['location'] }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="font-semibold">{{ $event['start_date_time'] }} / {{ $event['end_date_time'] }}</span>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-3 border-b pb-2">
                Tentang experience ini
            </h2>
            <div class="text-gray-700 space-y-4">
                <p>
                    {{ $event['description'] }}
                </p>
            </div>
            <div class="mt-6">
                <span class="inline-block bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded-full">{{ $event->category->name }}</span>
            </div>
        </div>
    </div>
</div>
</x-front-page.layout>