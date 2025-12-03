@extends('layout.app')
@section('title', 'Página de inicio')

@section('content')
    <div class="border-b border-gray-300 m-auto w-[1100px]">
        <h1 class="text-2xl font-bold text-center mb-4">Página de inicio</h1>
        @if (session('success'))
            <div class="mt-2 mb-2">
                <p class="text-center text-purple-800">{{ session('success') }}</p>
            </div>
        @endif
    </div>
    <div class="m-auto w-[1100px] mt-4">
        @forelse ($poemas as $poema)
            <div class="mb-4 border border-gray-300 pb-3 pt-3 bg-[#e8e2d123] hover:bg-[#e8e2d136]">
                <a href="{{ route('poems.show', $poema->id) }}">
                    <div class="ml-5">
                        <h1 class="font-semibold">{{$poema->title}}</h1>
                        <p><span class="font-semibold">Dedicado a: </span><em>{{$poema->dedication}}</em></p>
                        <p><span class="font-semibold">Autor: </span>{{$poema->autor}}</p>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-center">No hay poemas.</p>
        @endforelse
    </div>
    <div class="m-auto w-[1100px] mt-4 border-t border-gray-300 pt-2">
        Acciones de navegación:
        <ul class="list-none list-inside">
            <li><a href="{{ route('poems.create') }}" class="text-blue-600 underline">Crear un nuevo poema</a></li>
        </ul>
    </div>
@endsection