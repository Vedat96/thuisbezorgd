<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $restaurants = Restaurant::all()->where('name', 'like', '%',$search, '%');
        return view('search', [ 'restaurants' => $restaurants]); 
    }

    public function index(Restaurant $restaurants)
    {
            $restaurants = Restaurant::get();

            return view('restaurants.index', ['restaurants'=>$restaurants]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            // if(Auth::user()->role_id == 1){
        
                return view('restaurants.create');
            // }
            // return view('auth.login');
        }
        return view('auth.login');

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
        if(Auth::check()){
            $restaurant = Restaurant::create([
            	'user_id' => Auth::user()->id,
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'zipcode' => $request->input('zipcode'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone')

            ]);
            if($restaurant){
                return redirect()->route('restaurants.show', ['restaurant'=> $restaurant->id])
                ->with('success' , 'Restaurant created successfully');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new restaurant');
            // return back()->withInput()->wordwrap(str)ith('errors' , 'Error creating new restaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Restaurant $restaurant)
    {        
        if($request->category) {
            $restaurant = Restaurant::with(['consumables' => function($query) use ($request) {
                return $query->where('category', $request->category);
            }])->find($restaurant->id);
        }
        else {
            $restaurant = Restaurant::with('consumables')->find($restaurant->id);
        }
            

        return view('restaurants.show', [ 'restaurant' => $restaurant]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
        $restaurant = Restaurant::find($restaurant->id );

        if(Auth::check()){
            // if(Auth::user()->role_id == 1){
        
                return view('restaurants.edit', [ 'restaurant' => $restaurant]);
            // }
            // return view('auth.login');
        }
        return view('auth.login');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {

        if(Auth::check()){
            $restaurantUpdate = Restaurant::where('id', $restaurant->id)
                                    ->update([
                                        'title' => $request->input('title'),
						                'email' => $request->input('email'),
						                'address' => $request->input('address'),
						                'zipcode' => $request->input('zipcode'),
						                'city' => $request->input('city'),
						                'phone' => $request->input('phone')
                                    ]);

            if($restaurantUpdate){
                return redirect()->route('restaurants.show',['restaurant'=>$restaurant->id])->with('succes', 'Restaurant updated succesfully');
            }
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $findRestaurant = Restaurant::find( $restaurant->id);
        if($findRestaurant->delete()){
            
            //redirect
            return redirect()->route('restaurants.index')
            ->with('success' , 'Restaurant deleted successfully');
        }
        return back()->withInput()->with('errors' , 'Restaurant could not be deleted');
        
    }
}
