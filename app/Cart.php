<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use StdClass;
use App\Consumable;
use Illuminate\Support\Facades\Session;


class Cart extends Model
{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function get()
    {
        $cart = new StdClass;
        $cart->item = ['item'];
        $cart->qty = ['qty'];
        $cart->item->price = ['price'];
        $cart->items = [];
        $cart->totalQty = 0;
        $cart->totalPrice = 0;
        return $cart;
    }
    public function remove($item, $id) {
        $cart = Session::has('cart') ? Session::get('cart') : [];
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        if ($storedItem['qty'] > "1" ) {
            $storedItem['qty']--;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty--;
            $this->totalPrice -= $item->price;     
        }
        else{
            unset($cart->items[$id]);

            // unset($_SESSION['cart']['products'][$id])
        }
    }

    // public static function get()
    // {
    //     return $_SESSION['cart'];
    // }

    private static function totalPrice()
    {
        // $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        // if ($this->items) {
        //     if (array_key_exists($id, $this->items)) {
        //         $storedItem = $this->items[$id];
        //     }
        // }
        // $totalPrice = a;
        $cart = Session::has('cart') ? Session::get('cart') : [];
        $totalPrice = $cart->items;
        foreach($cart as $key => $value) {
            $totalPrice += $value['price'] * $value['qty'];
        }

        $_SESSION['cart']['total'] = $totalPrice;
        return view('cart')->with(['totalPrice' => $totalPrice]);
        // $totalPrice = "test";
        // foreach($_SESSION['cart']['products'] as $key => $value) {
        //     $totalPrice += $value['price'] * $value['quantity'];
        // }

        // $_SESSION['cart']['total'] = $totalPrice;
    }

    public static function reset()
    {
        // default cart create
        $_SESSION['cart'] = [
            'products' => [],
            'total' => 0.00,
        ];
    }
}