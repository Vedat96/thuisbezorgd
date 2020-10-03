<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumable;
use App\Restaurant;
use Session;
use App\Cart;
use Auth;




class AddConsumableController extends Controller
{
   	public function update (Request $request, $id)
   	{
   		$consumable = Consumable::find($id);
   		$cart = Session::has('cart') ? Session::get('cart') : [];

   		if(!$cart){
   			$cart = new Cart($cart);
   		}
   		$cart->add($consumable, $consumable->id);
   		Session::put('cart',$cart);

         session()->flash('notif', 'Your consumable is added succesfully');
   		// dd($request->session()->get('cart'));
        // dd(session()->all()); 
   		return redirect()->back();
   }
}