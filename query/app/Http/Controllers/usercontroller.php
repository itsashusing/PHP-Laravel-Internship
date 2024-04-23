<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    public function showProducts()
    {
        $products = DB::table('products')->get();
        // return $products;
        // dd($products);
        return view('allproducts', ['products' => $products]);
    }
    public function singleProduct(string $id)
    {
        $products = DB::table('products')->where('id', $id)->get();
        // return $products;
        // dd($products);
        return view('singleproduct', ['products' => $products]);
    }

    public function addProduct()
    {
        // ##### create-------------------------------------------------------
        // $product = DB::table('products')->insert([
        //     'name' => 'New Name',
        //     'discriptions' => 'new discriptions ',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // ##### update------------------------------------

        // $product = DB::table('products')
        //     ->where('id', 1)
        //     ->update([
        //         'name' => 'updated name'
        //     ]);

        // ##### Delete--------------------------------------
        $product = DB::table('products')
            ->where('id', 1)
            ->delete();
    }
}
