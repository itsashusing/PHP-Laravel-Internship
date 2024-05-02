<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function usercart()
    {

        return $this->belongsTo(Product::class, 'productid');
    }
    public function user()
    {

        return $this->belongsTo(User::class, 'userid');
    }
   

    public static function subtotal($id)
    {
        $cartitems = UserCart::with('usercart')->where('productid', $id)->get();
        $price = 0;
        foreach ($cartitems as $key => $value) {
            $price = $price + $value->usercart->price * $value->quantity;
        }

        return $price;
    }
    public static function subtotal2()
    {
        $cartitems = UserCart::with('usercart')->get();
        $price = 0;
        foreach ($cartitems as $key => $value) {
            $price = $price + $value->usercart->price * $value->quantity;
        }
        return $price;
    }
}
