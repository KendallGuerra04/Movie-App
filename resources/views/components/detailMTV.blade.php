@extends('welcome')
@section('content')
    <div class="grid grid-rows-1 grid-flow-row gap-0 mt-0 h-3/6">
        <!-- Contenedor de la imagen de fondo -->
        <div class="h-screen relative">
            <img class="w-screen h-screen object-center object-cover" src="{{ $image . $data->backdrop_path }}"
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
        <div class="relative h-screen">
            <!-- Imagen de fondo con blur -->
            <div class="absolute inset-0 bg-cover bg-no-repeat blur-lg"
                style="background-image: url('{{ $image . $backgroundMT }}'); z-index: -1;">
            </div>

            <!-- Contenido superpuesto -->
            <div class="relative flex flex-row h-full">
                <!-- Contenedor del texto descriptivo -->
                <div class="p-8 text-white w-3/6">
                    <h2 class="text-2xl title font-semibold mb-4 animate__animated animate__flash animate__infinite">
                        <a href="{{ $data->homepage }}" target="_blank" class="text-amber-300 hover:text-white">
                            {{ isset($data->name) ? $data->name : $data->title }}
                        </a>
                    </h2>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 size-5 text-yellow-400 dark:text-yellow-600"
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span>{{ bcdiv($data->vote_average, '1', 1) }}/10</span> | <span>Rate</span>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex mt-5">
                            <p class="text-lg">
                                {{ $data->overview }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Contenedor del iframe -->
                <div class="p-8 text-white w-3/6">
                    <div class="relative w-full h-0 pb-[56.25%]"> <!-- Aspect ratio de 16:9 -->
                        @if (isset($video->key))
                            <iframe class="absolute top-0 left-0 w-full h-full"
                                src="https://www.youtube.com/embed/{{ $video->key }}" frameborder="0"
                                allowfullscreen></iframe>
                        @else
                            <img src="{{ asset('img/video_not_found.jpg') }}" class="absolute top-0 left-0 w-full h-full"
                                alt="">
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
