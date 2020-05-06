<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Channel::class, function (Faker $faker) {
    $name = $faker->word;

    return [
        'slug' => $name,
        'name' => $name,
    ];
});
