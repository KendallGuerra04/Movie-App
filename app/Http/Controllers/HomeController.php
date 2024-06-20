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
    private $resp;

    public function __construct()
    {
        $this->apikey = config('tmdb.apikey');
        $this->baseUrl = config('tmdb.base_url');
        $this->imageUrl = config('tmdb.image_url');
        $this->endpoints = config('tmdb.endpoints');
        $this->resp = false;
    }
    public function home()
    {
        $page = null;
        $this->resp = false;
        $response = $this->fetchData($this->endpoints['trending'], $this->resp, $page);
        $popularData = $response->object();
        // dd($popularData);
        return view('components.content.home', [
            'popularData' => $popularData,
            'image' => $this->imageUrl
        ]);
    }
    public function mtv($id, $type)
    {
        $page = null;
        if ($type == 'movie') {
            $detailUrl = sprintf($this->endpoints['movie_detail'], $id);
            $videoUrl = sprintf($this->endpoints['movie_videos'], $id);
            $image = sprintf($this->endpoints['movie_image'], $id);
        } else {
            $detailUrl = sprintf($this->endpoints['tv_detail'], $id);
            $videoUrl = sprintf($this->endpoints['tv_videos'], $id);
            $image = sprintf($this->endpoints['tv_image'], $id);
        }
        $detailResponse = $this->fetchData($detailUrl, $this->resp, $page);
        $videoResponse = $this->fetchData($videoUrl, $this->resp, $page);
        $imageResponse = $this->fetchData($image, $this->resp, $page);

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
    public function movies($page)
    {
        $this->resp = true;
        $response = $this->fetchData($this->endpoints['list_movies'], $this->resp, $page);
        $moviesData = $response->object();

        return view('components.mtv', [
            'popularData' => $moviesData,
            'image' => $this->imageUrl,
            'type' => 'movie',
            'page' => $page,
            'rout' => 'movies'
        ]);
    }
    public function series($page)
    {

        $this->resp = true;
        $response = $this->fetchData($this->endpoints['list_tv'], $this->resp, $page);
        $tvData = $response->object();
        return view('components.mtv', [
            'popularData' => $tvData,
            'image' => $this->imageUrl,
            'type' => 'tv',
            'page' => $page,
            'rout' => 'series'
        ]);
    }

    private function fetchData($endpoint, $search, $page)
    {
        if ($search == true) {
            $url = $this->baseUrl . $endpoint . '?api_key=' . $this->apikey . '&region=PA&page=' . $page;
        } else {
            $url = $this->baseUrl . $endpoint . '?api_key=' . $this->apikey;
        }
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
