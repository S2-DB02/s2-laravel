<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
        {


                //$alldata = DB::table('messages')->get();
                //$leaderboardData = DB::table('users')->orderByDesc('user_credits')->get();
                //$b = DB::table('users')->orderByDesc('user_credits')->get();
                
                
                return view('test');

            //data ophalen uit database

        }
}
