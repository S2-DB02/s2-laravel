<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $users = User::paginate(20);

        return view('Users.dashboard', ['users' => $users]);
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
    public function store(Request $data)
    {
            $data->validate( [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            if(User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->password),
            ])){
                return back()->with('success', 'User has been added :)');
            }else {
                return back()->with('error', 'Somthing went wrong :(');
            }
            
        // }else {
        //     //error pages
        //     return false;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
        // $user = $users::find($users->id);
        // return view('', ['user' => $user]);

        if (url()->current() == "http://127.0.0.1:8000/api/user/$users->id") {
            //dd(User::find($users->id));
            //return new UserResource($users);
            return new UserResource(User::find($users->id));
        }
        //return new UserResource($user);
        //return new UserResource(User::find(1));
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
        $user = User::find($request->hidden);
        // $hased = Hash::make($request->password);
        // $user->password = $hased;
        $user->user_role = $request->UserRole;
        $user->save();
        return GebruikersController::index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gebruikers  $gebruikers
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users,Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return GebruikersController::index();
    }
}
