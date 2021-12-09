<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;





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
     * @param  \Illuminate\Http\StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $data)
    {
        $newuser = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'api_token' => Str::random(60),
        ]);
            if($newuser == true && url()->current() == config('app.externalconnection')."/user"){
                return back()->with('success', 'User has been added :)');
            }elseif($newuser == false && url()->current() == config('app.externalconnection')."/user") {
                return back()->with('error', 'Something went wrong :(');
            }elseif ($newuser == true && url()->current() == config('app.externalconnection')."/api/user") {
                //dd(Str::random(60));
                return view('errors.register-success', ['user' => $newuser]);
            }elseif($newuser == false && url()->current() == config('app.externalconnection')."/api/user") {
                return view('errors.register-error');
            }

        // if (url()->current() == config('app.externalconnection')."/user") {
        //     $newuser = User::create([
        //         'name' => $data->name,
        //         'email' => $data->email,
        //         'password' => Hash::make($data->password),
        //     ]);
        //     if ($newuser == true) {
        //         return back()->with('success', 'User has been added :)');
        //     }else {
        //         return back()->with('error', 'Somthing went wrong :(');
        //     }
        // }else {
        //     $newuser = User::create([
        //         'name' => $data->name,
        //         'email' => $data->email,
        //         'password' => Hash::make($data->password),
        //         'api_token' => Str::random(60),
        //     ]);
        //     if ($newuser == true) {
        //         return view('errors.register-success', ['user' => $newuser]);
        //     }else {
        //         return view('errors.register-error');
        //     }
        // }
            
        // }else {
        //     //error pages
        //     return false;
        // }
    }


     /**
     * Display the specified resource.
     *
     * @param  \App\User  $users
     *          
     * @return \Illuminate\Http\Response
     */
    public function credChange()
    {
        return view('auth.passwords.reset');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gebruikers  $gebruikers
     * @return \Illuminate\Http\Response
     */
    public function credUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required','string','max:255',
            'email' => 'string','email:rfc,dns','max:255','regex:/^[A-Za-z0-9.]*@(bastrucks|basworld)[.](com)+$/',
            'password' => 'required','string','min:8','confirmed',
         ]);
        //dd($validatedData);
        $user = User::find($request->hiddenid);
        //dd($validatedData);
        $user->name = $validatedData["name"];
        //dd($user);
        $user->password = Hash::make($validatedData["password"]);
        //dd($user);
        $user->save();
        return back()->with('success', 'User succesfully updated!');
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
        //$users = User::orderBy('points', 'desc')->limit(10)->get();

        if (url()->current() == config('app.externalconnection')."/api/user/$users->id") {
            //dd(User::find($users->id));
            //return new UserResource($users);
            return new UserResource(User::find($users->id));
        }
        //return new UserResource(User::find($users->id));
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
        $user->points = $request->points;
        $user->save();
        return back()->with('success', 'User succesfully updated!');
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
        return back()->with('success', 'User succesfully deleted!');
    }

    /**
     * Gets top 10 users with the most points.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTopTen()
    {
        return User::select('id','name', 'points')->orderBy('points', 'desc')->limit(10)->get();
    }
    public function getLoggedInUser(int $id){
        /*$id = 23;
        return User::find($id);*/
        return User::select('id','name', 'points')->where('id', $id)->get();
    }
}
