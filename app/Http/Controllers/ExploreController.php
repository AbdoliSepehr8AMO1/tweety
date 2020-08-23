<?php

namespace App\Http\Controllers;

use App\User;

class ExploreController extends Controller
{

    // users paginate to the set of 50 / you will see max of 50 users on the explore page
    public function __invoke()
    {
        return view('explore', [
            'users' => User::paginate(50),
        ]);
    }
}
