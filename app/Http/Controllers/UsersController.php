<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::all()->where('name', 'like', '%',$search, '%');
        
        return view('search', [ 'users' => $users]); 
    }

    public function index(User $users)
    {
        
            $users = User::all();

            return view('users.index', ['users'=>$users]);
        // } 
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     if(Auth::check()){
    //         if(Auth::user()->role_id == 1){
        
    //             return view('users.create');
    //         }
    //         return view('auth.login');
    //     }
    //     return view('auth.login');

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(Auth::check()){
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('adress'),
                'zipcode' => $request->input('zipcode'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone'),
                'password' => password_hash($request->input('password'),PASSWORD_BCRYPT)

            ]);
            if($user){
                return redirect()->route('users.show', ['user'=> $user->id])
                ->with('success' , 'User created successfully');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new user');
            // return back()->withInput()->wordwrap(str)ith('errors' , 'Error creating new user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id );


        

        return view('users.show', [ 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = User::find($user->id );
        
        if(Auth::check()){
            
        
                return view('users.edit', [ 'user' => $user]);
            }
            return view('auth.login');
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // save data 
        if(Auth::check()){
            $userUpdate = User::where('id', $user->id)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'address' => $request->input('adress'),
	                'zipcode' => $request->input('zipcode'),
	                'city' => $request->input('city'),
	                'phone' => $request->input('phone'),
					'password' => password_hash($request->input('password'),PASSWORD_BCRYPT),
                    'role_id' => $request->input('role_id'),

                                        
                        ]);

            if($userUpdate){
                return redirect()->route('users.show',['user'=>$user->id])->with('succes', 'User updated succesfully');
            }
            //redirect
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $findUser = User::find( $user->id);
        if($findUser->delete()){
            
            //redirect
            return redirect()->route('users.index')
            ->with('success' , 'User deleted successfully');
        }
        return back()->withInput()->with('errors' , 'User could not be deleted');
        
    }
}