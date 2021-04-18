<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Consumable;
use App\Cart;
use App\Http\Requests;
use Session;
use Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (!Session::has('cart')) {
                return view('cart', ['consumables' => null]);
            }
            return view('cart')
                ->with('consumables', Session::get('cart'));

 

            // $oldCart = Session::get('cart');
            // $cart = (new Cart($oldCart))->get();
            $cart = Session::get('cart');
            $consumable = Consumable::find($id);
            $totalPrice = $cart->items;
            // $x = "alex";


            return view('cart')->with(['consumables' => $cart->items, 'cart->items' => $cart->items, 'totalQty' => $cart->totalQty, 'totalPrice' => $cart->totalPrice]);
    }
 

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

   public function remove (Request $request, $id)
   {
        $consumable = Consumable::find($id);
        $cart = Session::has('cart') ? Session::get('cart') : [];

        $cart->remove($consumable, $consumable->id);
        Session::put('cart',$cart);

        // if($cart->qty <= 0){
        //     unset($cart->items[$id]);
        //     // unset($cart['id']);

        // }

        session()->flash('notif', 'Your consumable is removed succesfully');
        return redirect()->back();

   }
    public function totalPrice(Request $request, $id)
   {
        $cart = Session::has('cart') ? Session::get('cart') : [];

        $totalPrice = 0;

   }

   public function reset(Request $request, $id){
        
   }
}