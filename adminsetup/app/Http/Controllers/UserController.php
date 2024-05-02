<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserCart;
use App\Models\Slider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $product = Product::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $product = Product::all();
        }
        if ($request->category_id) {
            $product = Product::where('category_id', $request->category_id)->get();
        }

        $cat = Category::all();
        $sliderimage = Slider::all();

        // return $cat;
        return view('user.home', compact('cat', 'product', 'sliderimage'));
    }
    public function userlogin(Request $request)
    {

        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([

                'email' => 'required|email|max:255',
                'password' => 'required',

            ]);
            $user = User::where('email', $request->email)->where('password', $request->password)->first();
            if ($user) {
                $request->session()->put('userid', $user->id);

                return redirect()->route('userprofile');
            } else {
                // return 'hello';
                return back()->with('danger', 'Credentials not found.');
            }
        }
        return view('user.login');
    }

    public function userprofile(Request $request)
    {
        if ($request->session()->has('userid')) {
            $id = $request->session()->get('userid');

            if ($request->isMethod('POST')) {
                $validatedData = $request->validate([
                    'name' => 'required|max:255',

                ]);
                $useraddress = new UserAddress;
                $useraddress->user_id = $id;
                $useraddress->villagename = $request->name;
                $useraddress->country = $request->country;
                $useraddress->state = $request->state;
                $useraddress->district = $request->distict;
                $useraddress->save();
                return back()->with('success', 'Address Added successfully');

            } else {


                $user = User::find($id);
                $country = Country::all();
                $cartitems = UserCart::with('usercart')->where('userid', $id)->get();
                $checkoutorders = Checkout::with('product')-> where('userid', $id)->get();
                // return $checkoutorders;
                $useraddress = UserAddress::with('usercountry', 'userstate', 'userdistrict')->get();
                // return $useraddress;
                return view('user.profile', compact('user', 'country', 'useraddress', 'cartitems', 'checkoutorders'));
            }
        } else {
            return redirect()->route('userlogin')->with('danger', 'First Login to access this page.');
        }
    }
    public function userlogout(Request $request)
    {
        if ($request->session()->has('userid')) {
            $request->session()->forget('userid');
            return redirect()->route('index')->with('success', 'Logout successfully.');

        } else {
            return redirect()->route('userlogin')->with('danger', 'First Login to access this page.');
        }

    }
    public function product($id)
    {
        $product = Product::with('category', 'sub_category', 'productimages')->where('id', $id)->get();
        $recentproduct = Product::orderBy('id', 'desc')->take(5)->get();
        $cart = UserCart::all();
        return view('user.getproduct', compact('product', 'recentproduct', 'cart'));
    }

    public function deleteuseraddress(Request $request, $id = null)
    {
        if ($request->session()->has('userid')) {
            $user = $request->session()->get('userid');
            $deluseraddress = UserAddress::find($id);

            if ($request->isMethod('PUT')) {
                $validatedData = $request->validate([
                    'villagename' => 'required|max:255',
                ]);

                // return 'hello';
                $useraddress = UserAddress::find($request->address_id);
                // return $useraddress;
                $useraddress->user_id = $user;
                $useraddress->villagename = $request->villagename;
                $useraddress->country = $request->usercountry;
                $useraddress->state = $request->userstates;
                $useraddress->default = $request->default ? '1' : '0';
                $useraddress->district = $request->userdistict;
                $useraddress->save();
                return back()->with('success', 'Address updated successfully');
            }
        } else {
            return redirect()->route('userlogin')->with('danger', 'First Login to access this page.');
        }
    }


    public function updateaddress(Request $request, $id = null)
    {
        if ($request->session()->has('userid')) {
            if ($id) {
                $useraddress = UserAddress::find($id);
                return $useraddress->villagename;
            }
        } else {
            return redirect()->route('userlogin')->with('danger', 'First Login to access this page.');
        }
    }
    public function userdetails(Request $request, $id)
    {
        if ($request->session()->has('userid')) {
            if ($id) {
                $user = User::find($id);
                $cartitems = UserCart::with('usercart')->where('userid', $id)->get();

                // return $cartitems;
                return view('userdetails', compact('user', 'cartitems'));
            }
        } else {
            return redirect()->route('userlogin')->with('danger', 'First Login to access this page.');
        }
    }

}