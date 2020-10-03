<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use StdClass;
use App\Consumable;

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
}