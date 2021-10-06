<?php

use Illuminate\Database\Seeder;
use App\ticket;
use Faker\Factory as Faker;


class TicketsSeeder extends Seeder
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
        ticket::make([
            'name' => $faker->word,
            'photo' => $faker->imageUrl(640, 480, 'cats'),
            'remark' => $faker->text,
            'status' => $faker->randomElement($array = array ( 1, 2, 3 )),
            'type' => $faker->randomElement($array = array (1, 2, 3, 4, 5 )),
            'user_id' => $faker->randomDigitNotNull,
            'URL' => $faker->url
            ])->save();
    endfor;
    }
}