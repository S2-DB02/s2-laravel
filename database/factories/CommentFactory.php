<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\comment;
use Faker\Generator as Faker;

$factory->define(comment::class, function (Faker $faker) {
    return [
        //
        'comment' => $faker->text(100),
        'ticketId' => 1,
        'userId' => 1,
    ];
});
