<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user
                ->tweets()
                ->withLikes()
                ->paginate(50),
        ]);
    }


    // you can not edit somone else profile with this code voor securtiy
    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }


    //validation before updating the users data
    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name' => ['string', 'required', 'max:255'],

            // avatar is not required because then everytime you update your profile you also need a avatar image
            'avatar' => ['image'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);


        // after you run this will save the image and return the path to where the image is stored
        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        //update the new arrtibutes
        $user->update($attributes);

        // and then redirect users path
        return redirect($user->path());
    }
}
