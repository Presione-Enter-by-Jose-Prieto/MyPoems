@extends('layout.app')
@section('title', 'Estas editando: '.$poema->title)

@section('content')
    <h1 class="text-2xl font-bold text-center">Estas editando: {{$poema->title}}</h1>
    <div class="m-auto w-[1100px] mt-4 pb-4">
        <form action="{{ route('poems.update', $poema->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="text-center block" for="title"><span class="font-semibold">Dame un nombre:</span></label>
            <input
             type="text"
             id="title"
             name="title"
             class="w-full border-none focus:outline-none text-center mb-1"
             value="{{ $poema->title }}"
             required
            >
            <label class="text-center block" for="poem-content"><span class="font-semibold">Contenido:</span></label>
            <textarea
             id="poem-content"
             name="content"
             rows="6"
             cols="4"
             class="w-full border-none focus:outline-none text-center resize-none mb-3"
             required
            >{{ $poema->content }}</textarea>
            <div class="flex flex-row justify-center">
                <label class="text-center block" for="dedication"><span class="font-semibold">Dedicación (opcional):</span>
                    <input
                    type="text"
                    id="dedication"
                    name="dedication"
                    value="{{ $poema->dedication }}"
                    class="w-full border-none focus:outline-none text-center"
                    >
                </label>
                <label class="text-center block" for="autor"><span class="font-semibold">Autor:</span>
                    <input
                    type="text"
                    id="autor"
                    name="autor"
                    class="w-full border-none focus:outline-none text-center"
                    value="{{ $poema->autor }}"
                    >
                </label>
            </div>
            <div class="flex justify-between mt-5 mx-10">
                Acciones de formulario:
                <button
                 type="submit"
                 class="cursor-pointer bg-white px-2 py-0.5 rounded border border-gray-400 hover:bg-gray-100 text-sm"
                >
                    Actualizar poema
                </button>
            </div>
        </form>
    </div>
    <div class="m-auto w-[1100px] mt-6 border-t border-gray-300 pt-2 flex flex-row justify-between">
        <div>
            Acciones de navegación:
            <ul class="list-none list-inside">
                <li><a href="{{ route('poems.show', $poema->id) }}" class="text-purple-600 underline">Volver a la vista del poema</a></li>
                <li><a href="{{ route('poems.index') }}" class="text-blue-600 underline">Ver lista de todos los poemas</a></li>
            </ul>
        </div>
        <div class="text-end">
            Acciones de poema:
            <ul class="list-none list-inside">
                <li class="flex justify-end">
                    <form action="{{ route('poems.destroy', $poema->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este poema?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 underline bg-transparent border-none p-0 m-0 cursor-pointer">Eliminar este poema</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ta = document.getElementById('poem-content');
            if (!ta) return;
            const adjust = () => {
                ta.style.height = 'auto';
                ta.style.height = ta.scrollHeight + 'px';
            };
            adjust();
            ta.addEventListener('input', adjust);
        });
    </script>
@endsection