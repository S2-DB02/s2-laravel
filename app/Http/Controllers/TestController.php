<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
        {


                $alldata = DB::table('tickets')->get();
                //$leaderboardData = DB::table('users')->orderByDesc('user_credits')->get();
                //$b = DB::table('users')->orderByDesc('user_credits')->get();
                
                
                return view('dashboard.dashboard', [ 'alldata' => $alldata]);

            //data ophalen uit database

        }
}
