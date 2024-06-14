@extends('welcome')
@section('content')
    <div class="grid grid-rows-1 grid-flow-row gap-0 mt-0 h-3/6">
        <!-- Contenedor de la imagen de fondo -->
        <div class="h-full relative">
            <img class="w-screen h-screen object-center object-fit" src="{{ $image . $data->backdrop_path }}"
                alt="Imagen de fondo">
            <!-- Texto superpuesto opcionalmente -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="flex flex-col">
                    <div class="flex flex-wrap gap-2 justify-center mb-5">
                        <h1 class="text-white text-4xl font-bold bg-black bg-opacity-50 p-4 rounded-lg">
                            {{ isset($data->name) ? $data->name : $data->title }}
                        </h1>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($data->genres as $genre)
                            <span
                                class="text-white bg-gray-700 bg-opacity-50 px-3 py-1 rounded-lg">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Contenedor del texto descriptivo -->
        <div class="p-8">

            <h2 class="text-white text-2xl font-semibold mb-4"></h2>


            <p class="text-lg">Aquí va la descripción de la película...</p>
        </div>
    </div>
@endsection
