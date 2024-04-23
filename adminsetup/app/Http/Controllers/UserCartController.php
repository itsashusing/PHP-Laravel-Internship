<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function addtocartitem(Request $request, $id)
    {
        if ($request->session()->has('userid')) {
            $userid = $request->session()->get('userid');
            $cart = new UserCart;
            $cart->userid = $userid;
            $cart->productid = $id;
            $cart->save();
            return back()->with('success', 'Item  added to card.');

        } else {
            return redirect()->route('userlogin')->with('danger', "First login to add to card");
        }
    }
    public function removecartitem(Request $request, $id)
    {
        if ($request->session()->has('userid')) {
            $userid = $request->session()->get('userid');
            $cartitem = UserCart::where('productid', $id);
            $cartitem->delete();
            return back()->with('success', 'Item removed successfully.');

        } else {
            return redirect()->route('userlogin')->with('danger', "First login to access this route");
        }
    }
    public function incrementcartitem(Request $request, $id)
    {
        if ($request->session()->has('userid')) {
            $cartitem = UserCart::where('productid', $id)->first();
            if ($cartitem->quantity < 10) {
                $cartitem->quantity = $cartitem->quantity + 1;
                $cartitem->save();
                return $cartitem->quantity;
            } else
                session()->flash('danger', 'Maximum limit reached.');


        } else {
            return redirect()->route('userlogin')->with('danger', "First login to access this route");
        }
    }
    public function decrement(Request $request, $id)
    {
        if ($request->session()->has('userid')) {
            $cartitem = UserCart::where('productid', $id)->first();
            if ($cartitem->quantity > 1) {
                $cartitem->quantity = $cartitem->quantity - 1;
                $cartitem->save();
                return $cartitem->quantity;
            } else {
                session()->flash('danger', 'Minimum limit reached.');

            }
        } else {
            return redirect()->route('userlogin')->with('danger', "First login to access this route");
        }
    }
}