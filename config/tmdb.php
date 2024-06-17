<?php
return [
    'apikey' => env('TMDB_API_KEY'),
    'base_url' => 'https://api.themoviedb.org/3/',
    'image_url' => 'https://image.tmdb.org/t/p/original',
    'endpoints' => [
        'trending' => 'trending/all/day',
        'movie_detail' => 'movie/%s',
        'tv_detail' => 'tv/%s',
        'movie_videos' => 'movie/%s/videos',
        'tv_videos' => 'tv/%s/videos',
        'tv_image' => 'tv/%s/images',
        'movie_image' => 'movie/%s/images',
        'list_movies' => 'discover/movie',
        'list_tv' => 'discover/tv',
    ],
];
