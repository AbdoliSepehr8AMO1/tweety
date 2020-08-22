<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetsController extends Controller
{

    //processing the tweet so the rules for the tweet that has to apply before it's posted
    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        // send the tweet to the homepage
        return redirect('/home');
    }
}
