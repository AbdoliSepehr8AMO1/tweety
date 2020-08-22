<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        //providing the model to the factory
        'user_id' => factory(App\User::class),
        'body' => $faker->sentence
    ];
});
