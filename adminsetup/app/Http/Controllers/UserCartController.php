<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
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
            $product = Product::find($id);
            if ($product->quantity > 0) {
                if ($cartitem->quantity < 10) {
                    $cartitem->quantity = $cartitem->quantity + 1;

                    $cartitem->save();
                    return $cartitem->quantity;
                } else {

                    session()->flash('danger', 'Maximum limit reached.');
                }
            } else {
                session()->flash('danger', 'Out of stock.');
            }



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
    public function checkout(Request $request)
    {
        if ($request->session()->has('userid')) {

            $userid = $request->session()->get('userid');
            $cartitems = UserCart::with('usercart')->where('userid', $userid)->get();
            if (count($cartitems) > 0) {
                // return $cartitems;
                foreach ($cartitems as $item) {
                    // return $item;
                    $checkout = new Checkout;
                    $checkout->userid = $item->userid;
                    $checkout->productid = $item->productid;
                    $checkout->categoryid = $item->usercart->category_id;
                    $checkout->subcategoryid = $item->usercart->subcategory_id;
                    $checkout->price = $item->usercart->price;
                    $checkout->totalprice = $item->quantity * $item->usercart->price;
                    $checkout->quantity = $item->quantity;
                    $checkout->created_at = now();

                    // Check Product Quantity

                    $product = Product::find($item->productid);
                    if ($product->quantity < $item->quantity) {
                        return back()->with('danger', 'Out of stock.');
                    } else {
                        $product->quantity = $product->quantity - $item->quantity;
                        $product->save();
                        $checkout->save();
                        $cartitems = UserCart::where('productid', $item->productid)->get();

                        foreach ($cartitems as $cartitem) {

                            $cartitem->delete();
                        }

                    }
                }
                return back()->with('success', 'Order placed successfully.');

            } else {
                return back()->with('danger', 'Cart is empty.');

            }

        } else {
            return redirect()->route('userlogin')->with('danger', 'First Login to access this page.');
        }
    }
}
