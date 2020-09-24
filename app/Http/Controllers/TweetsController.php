<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{

    public function index()
    {
        return view('tweets.index', [
            'tweets'=> auth()->user()->timeline(),
        ]);
    }

    public function store()
    {
        //dd(request()->all());
        $attributes = request()->validate(['body' => 'required|max:255']);

        Tweet::create([
            'user_id'=> auth()->id(),
            'body'=> $attributes['body']
        ]);

        return redirect('/tweets');
    }

    public function destroy(Tweet $tweet)
    {
        //$this->authorize('manage', $tweet);
        $tweet->delete();
        return redirect('/tweets');
    }
}
