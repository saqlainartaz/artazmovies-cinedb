<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    public function movies($page = 1)
    {
        $client = new Client();

        $response = $client->request('GET', "https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=$page&sort_by=popularity.desc", [
            'headers' => [
                'Authorization' => 'Bearer ' . env('TMDB_TOKEN'),
                'accept' => 'application/json',
            ],
        ]);

        // Convert the Guzzle stream into a PHP array
        $data = json_decode($response->getBody(), true);

        // We grab the 'results' key which contains the actual list of movies
        $movies = $data['results'] ?? [];
        $total_pages = min($data['total_pages'] ?? 1, 500);

        return view('movies', ['movies' => $movies, 'pages' => $total_pages, 'current_page' => $page]);
    }

    public function show($id)
    {
        $client = new Client();

        $response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$id}?append_to_response=credits", [
            'headers' => [
                'Authorization' => 'Bearer ' . env('TMDB_TOKEN'),
                'accept' => 'application/json',
            ],
        ]);

        $movie = json_decode($response->getBody(), true);

        return view('movie', compact('movie'));
    }
}