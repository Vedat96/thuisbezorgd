<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(Request $request, User $user)
    {
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
                    // 'role_id' => $request->input('role_id'),

                                        
                        ]);

            if($userUpdate){
                return redirect()->route('order',['user'=>$user->id])->with('succes', 'User updated succesfully');
            }
            
        return view('order', [ 'user' => $user]);
            
        }
    }

    public function edit(User $user)
    {
        //
        $user = User::find($user->id );
        
        if(Auth::check()){
            
        
                return view('users.edit', [ 'user' => $user]);
            }
            return view('auth.login');
        
        
    }

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
                return redirect()->route('order', ['user'=> $user->id])
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
}