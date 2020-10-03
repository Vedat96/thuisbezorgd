<?php
namespace App\Http\Controllers;
use App\Consumable;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConsumablesController extends Controller{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    	{
         //
         if( Auth::check() ){
             $consumables = Consumable::where('restaurant_id', Auth::user()->id)->get();

            return view('consumables.index', ['consumables'=> $consumables]);  
         }
         return view('auth.login');
     }

    public function create( $restaurant_id = null )
    	{
         //
        $restaurants = null;
        if(!$restaurant_id){
           $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        }
 
        return view('consumables.create',['restaurant_id'=>$restaurant_id, 'restaurants'=>$restaurants]);
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
            $consumable = Consumable::create([
                'category' => $request->input('category'),
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'restaurant_id' => $request->input('restaurant_id'),
                'user_id' => Auth::user()->id
            ]);
 
 
            if($consumable){
                return redirect()->route('consumables.show', ['consumable'=> $consumable->id])
                ->with('success' , 'consumable created successfully');
            }
 
        }
         
            return back()->withInput()->with('errors', 'Error creating new consumable');
 
    }
    
 
     /**
      * Display the specified resource.
      *
      * @param  \App\consumable  $consumable
      * @return \Illuminate\Http\Response
      */
    public function show(Request $request, $restaurantId, $id, Restaurant $restaurant)
    {
        if($request->category) {
            $restaurant = Restaurant::with(['consumables' => function($query) use ($request) {
                return $query->where('category', $request->category);
            }])->find($restaurant->id);
        }
        else {
            $restaurant = Restaurant::with('consumables')->find($restaurant->id);
        }

        // $consumable = Consumable::where('id', $consumable->id )->first();
        $consumable = Consumable::find($id);

        return view('consumables.show', ['consumable'=>$consumable, 'restaurant'=>$restaurant]);   // , 'tasks'=> $tasks 
    }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\consumable  $consumable
      * @return \Illuminate\Http\Response
      */
    public function edit($id)
    {
         //
         $consumable = Consumable::find($id);
         
         return view('consumables.edit', ['consumable'=>$consumable]);
    }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\consumable  $consumable
      * @return \Illuminate\Http\Response
      */
    public function update(Request $request, $id)
    {
        
       //save data
 
       $consumableUpdate = Consumable::where('id', $id)
                 ->update([
                        'category' => $request->input('category'),
			            'name' => $request->input('name'),
			            'price' => $request->input('price'),
                        'description'=> $request->input('description')
                                 ]);
 
    	if($consumableUpdate){
           return redirect()->route('consumables.show', ['consumable'=> $id])
           ->with('success' , 'consumable updated successfully');
    	}
    	//redirect
    	return back()->withInput();
 
 
       
    }
 
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\consumable  $consumable
	* @return \Illuminate\Http\Response
	*/
    public function destroy(Consumable $consumable)
    {
         //
 
         $findconsumable = Consumable::find( $consumable->id);
         if($findconsumable->delete()){
             
             //redirect
             return redirect()->route('consumables.index')
             ->with('success' , 'consumable deleted successfully');
         }
 
         return back()->withInput()->with('error' , 'consumable could not be deleted');
         
 
    }
}