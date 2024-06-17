<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\JsonDecoder;

class HomeController extends Controller
{
    private $apikey;
    private $baseUrl;
    private $imageUrl;
    private $endpoints;

    public function __construct()
    {
        $this->apikey = config('tmdb.apikey');
        $this->baseUrl = config('tmdb.base_url');
        $this->imageUrl = config('tmdb.image_url');
        $this->endpoints = config('tmdb.endpoints');
    }
    public function home()
    {
        $response = $this->fetchData($this->endpoints['trending']);
        $popularData = $response->object();
        // dd($popularData);
        return view('components.content.home', [
            'popularData' => $popularData,
            'image' => $this->imageUrl
        ]);
    }
    public function movie($id, $type)
    {
        if ($type == 'movie') {
            $detailUrl = sprintf($this->endpoints['movie_detail'], $id);
            $videoUrl = sprintf($this->endpoints['movie_videos'], $id);
            $image = sprintf($this->endpoints['movie_image'], $id);
        } else {
            $detailUrl = sprintf($this->endpoints['tv_detail'], $id);
            $videoUrl = sprintf($this->endpoints['tv_videos'], $id);
            $image = sprintf($this->endpoints['tv_image'], $id);
        }
        $detailResponse = $this->fetchData($detailUrl);
        $videoResponse = $this->fetchData($videoUrl);
        $imageResponse = $this->fetchData($image);

        $detailMT = $detailResponse->object();
        $videoMT = $videoResponse->object();
        $imageMT = $imageResponse->object();

        $getImage = $this->getImage($imageMT->backdrops, $detailMT->backdrop_path);
        $firstTrailer = $this->getFirstTrailer($videoMT->results);

        return view('components.detailMTV', [
            'data' => $detailMT,
            'image' => $this->imageUrl,
            'video' => $firstTrailer,
            'backgroundMT' => $getImage
        ]);
    }
    public function movies()
    {
        $response = $this->fetchData($this->endpoints['list_movies']);
        $moviesData = $response->object();
        return view('components.mtv', [
            'popularData' => $moviesData,
            'image' => $this->imageUrl,
            'type' => 'movie'
        ]);
    }
    public function series()
    {
        $response = $this->fetchData($this->endpoints['list_tv']);
        $tvData = $response->object();
        return view('components.mtv', [
            'popularData' => $tvData,
            'image' => $this->imageUrl,
            'type' => 'tv'
        ]);
    }

    private function fetchData($endpoint)
    {
        $url = $this->baseUrl . $endpoint . '?api_key=' . $this->apikey;
        return Http::get($url);
    }
    private function getFirstTrailer($videos)
    {
        foreach ($videos as $video) {
            if ($video->type == 'Trailer' || $video->type != 'Trailer') {
                return $video;
            }
        }
    }

    private function getImage($images, $imageTM)
    {
        foreach ($images as $image) {
            if ($image->file_path <> $imageTM) {
                return $image->file_path;
            }
        }
    }
}
