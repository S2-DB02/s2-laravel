<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TicketsSeeder::class);


//        for($i = 0; $i < 1000; $i++) {
//            App\User::create([
//                'username' => $faker->userName,
//                'name' => $faker->name,
//                'email' => $faker->email
//            ]);
//        }
    }
}
