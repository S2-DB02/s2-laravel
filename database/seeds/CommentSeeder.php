<?php

use Illuminate\Database\Seeder;
use App\comment;
use Faker\Factory as Faker;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('App\ticket');
        for($i=0; $i<=100; $i++):
        comment::make([
            'comment' => $faker->text,
            'ticketId' => $faker->randomDigitNotNull,
            'userId' => $faker->randomDigitNotNull,
            ])->save();
    endfor;
    }
}