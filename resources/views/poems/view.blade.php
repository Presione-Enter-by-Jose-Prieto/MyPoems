@extends('layout.app')
@section('title', $poema->title)

@section('content')
    <h1 class="text-2xl font-bold text-center">{{$poema->title}}</h1>
    @if (session('success'))
        <div class="mt-2">
            <p class="text-center text-purple-800">{{ session('success') }}</p>
        </div>
    @endif
    <div class="m-auto flex justify-center w-[1100px] mt-4 mb-4">
        <p class="text-center w-[220px]">{{$poema->content}}</p>
    </div>
    <div>
        <p class="text-center"><span class="font-semibold">Dedicado a: </span><em>{{$poema->dedication}}</em></p>
        <p class="text-center"><span class="font-semibold">Autor: </span>{{$poema->autor}}</p>
    </div>
    <div class="m-auto w-[1100px] mt-6 border-t border-gray-300 pt-2 flex flex-row justify-between">
        <div>
            Acciones de navegación:
            <ul class="list-none list-inside">
                <li><a href="{{ route('poems.index') }}" class="text-blue-600 underline">Ver lista de todos los poemas</a></li>
            </ul>
        </div>
        <div class="text-end">
            Acciones de poema:
            <ul class="list-none list-inside">
                <li class="flex justify-end"><a href="{{ route('poems.edit', $poema->id) }}" class="text-blue-600 underline">Editar este poema</a></li>
                <li class="flex justify-end">
                    <form action="{{ route('poems.destroy', $poema->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este poema?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 underline bg-transparent border-none p-0 m-0 cursor-pointer">Eliminar este poema</button>
                    </form>
            </ul>
        </div>
    </div>
@endsection