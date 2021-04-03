<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

      

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id 
        ]);

        if($user && $profile){
            return redirect(route('admin.user.index'))->with('message' , 'User Created Successfully');
        }
    }

    /**
     * Make the user admin
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        return redirect(route('admin.user.index'))->with('message' , 'User Role Changed to Admin');
    }
    /**
     * Make the user simple user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function not_admin($id)
    {   
        $user = User::find($id);
        // if($user->admin == 1){
        //     return redirect(route('admin.user.index'))->with('message' , 'You cannot change your persmission');
        // } else {
            $user->admin = 0;
            $user->save();
    
            return redirect(route('admin.user.index'))->with('message' , 'User Role Changed to User');
        // }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        return redirect(route('admin.user.index'))->with('message' , 'User Deletd Successfully');
    }
}
