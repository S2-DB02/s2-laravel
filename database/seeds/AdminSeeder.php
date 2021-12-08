<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('App\User');
        try {
            User::make([
                'name' => "Administrator",
                'email' => "admin@server.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'user_role' => "3",
                'remember_token' => Str::random(10),
                ])->save();
        } catch(Exception $e) { 
        //Die with a message
        Log::channel('stderr')->info('Admin already present in database!');
        }
    }
}