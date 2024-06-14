<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\JsonDecoder;

class HomeController extends Controller
{
    private $apikey;
    private $urlMoviePopular;
    private $urlDetailMovie;
    private $urlDetailTv;
    private $urlImage;

    public function __construct()
    {
        $this->apikey = '?api_key=38bce4f5ebd5234816a6cc12405e99fb';
        $this->urlMoviePopular = 'https://api.themoviedb.org/3/trending/all/day';
        $this->urlDetailMovie = 'https://api.themoviedb.org/3/movie/';
        $this->urlImage = 'https://image.tmdb.org/t/p/original';
        $this->urlDetailTv = 'https://api.themoviedb.org/3/tv/';
    }
    public function home()
    {
        $response = Http::get($this->urlMoviePopular . $this->apikey);
        $popularData = $response->object();
        return view('components.content.home', ['popularData' => $popularData, 'image' => $this->urlImage]);
    }
    public function movie($id, $type)
    {
        if ($type == 'movie') {
            $response = Http::get($this->urlDetailMovie . $id . $this->apikey);
        } else {
            $response = Http::get($this->urlDetailTv . $id . $this->apikey);
        }
        $detailMT = json_decode($response);
        return view('components.detailMTV', ['data' => $detailMT, 'image' => $this->urlImage]);
    }
}
