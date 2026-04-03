<?php

namespace App\Http\Controllers;


use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'title' => 'required',
        ]);

        Watchlist::updateOrCreate(
            ['user_id' => Auth::id(), 'movie_id' => $request->movie_id],
            [
                'title' => $request->title,
                'poster_path' => $request->poster_path,
                'status' => $request->status ?? 'plan_to_watch'
            ]
        );

        return back()->with('success', 'Added to your watchlist!');
    }

    public function index()
    {
        $watchlist = Auth::user()->watchlists()->orderBy('created_at', 'desc')->get();
        return view('watchlist', compact('watchlist'));
    }
}

