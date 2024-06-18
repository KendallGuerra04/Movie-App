@extends('welcome')
@section('content')
    <div class="container mx-auto max-w-7xl py-2 sm:px-6 lg:px-8 ">
        <h1
            class="text-4xl font-bold subpixel-antialiased decoration-blue-400 decoration-wavy underline decoration-4 text-white text-center">
            Popular
            Movies and
            TV-series</h1>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-10 mt-5">
            @foreach ($popularData->results as $data)
                <div>
                    <figure class="relative max-w-sm transition-all duration-300 cursor-pointer">
                        <a href="{{ route('mtv', ['id' => $data->id, 'type' => $data->media_type]) }}">
                            <img class="h-96 rounded-lg brightness-100 hover:brightness-50"
                                src="{{ $image . $data->poster_path }}" alt="image description">
                        </a>
                        <figcaption class="absolute px-4 bottom-6">
                            <span
                                class="inline-flex items-center text-center gap-x-1.5 py-1.5 px-3 rounded-full text-base font-bold bg-gray-800 text-white dark:bg-white dark:text-neutral-800">{{ isset($data->name) ? $data->name : $data->title }}</span>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
@endsection
