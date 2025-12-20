@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    {{-- TODO: Nanti mau dibikin layout grid di sini --}}
    <div class="text-center">
        <h1 class="text-2xl font-bold text-gray-700">Halaman Edit Profile (Sedang Dibuat)</h1>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="flex justify-center">
        {{-- Card Putih Pembungkus --}}
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg border border-gray-200 overflow-hidden">
            
            {{-- Header Judul --}}
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-700">Edit Profile</h3>
            </div>

            <form>
                <div class="md:flex">
                    {{-- Kolom Kiri: Tempat Foto --}}
                    <div class="md:w-1/3 p-8 border-b md:border-b-0 md:border-r border-gray-200 bg-gray-50/50">
                        <p class="text-gray-500">Area Foto Profil</p>
                    </div>

                    {{-- Kolom Kanan: Tempat Input Form --}}
                    <div class="md:w-2/3 p-8">
                        <p class="text-gray-500">Area Input Data</p>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection