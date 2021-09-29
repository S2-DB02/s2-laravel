<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ticket;
use Faker\Generator as Faker;

$factory->define(ticket::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->numberBetween(0, 3),
        'priority' => $faker->numberBetween(0, 3),
        'status' => $faker->numberBetween(0, 3),
        'user_id' => 1,
        'remark' => $faker->text(100), // password
        'status' => $faker->numberBetween(0, 3),
        'created_at' => $faker->dateTime
    ];
});
