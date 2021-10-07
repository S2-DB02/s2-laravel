<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;

class GebruikersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::All();

        return view('', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (RegisterController::validator($request->all())) {
            RegisterController::create($request->all());
        }else {
            //error pages
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\gebruikers  $gebruikers
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
        $user = $users::find($users->id);
        return view('', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gebruikers  $gebruikers
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        //
        $user = User::find($users->id);
        return view('', ['User' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gebruikers  $gebruikers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        //
        $user = User::find($users->id);
        $user = $request;
        $user->save();
        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gebruikers  $gebruikers
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $user = User::destroy($users->id);
        return view();
    }
}
