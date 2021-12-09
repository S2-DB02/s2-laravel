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
            'priority' => $faker->numberBetween(1,3),
            'photo' => "https://i.ibb.co/xzyjbgb/Screenshot-from-2021-12-02-12-12-35.png",
            'remark' => $faker->text,
            'status' => $faker->randomElement($array = array ( 1, 2, 3 )),
            'type' => $faker->randomElement($array = array (1, 2, 3, 4, 5 )),
            'madeBy' => $faker->randomDigitNotNull,
            // 'developer' => $faker->randomDigit,
            'URL' => urlencode(urlencode($faker->url))
            ])->save();
    endfor;
    }
}