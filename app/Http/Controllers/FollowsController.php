<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {

        // use the togglefollow method in followable.php
        auth()
            ->user()
            ->toggleFollow($user);

        return back();
    }
}
