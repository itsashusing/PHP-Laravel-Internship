<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function allProducts()
    {
        $products = DB::table('products')->get();
        return view('home', ['products' => $products]);
    }

    public function deleteProduct($id)
    {
        $products = DB::table('products')
            ->where('id', $id)
            ->delete();
        if ($products) {
            return redirect()->route('home');
        }
    }

    public function addProduct(Request $req)
    {
        $product = DB::table('products')
            ->insert([
                'name' => $req->name,
                'discriptions' => $req->discription
            ]);
        if ($product) {
            return redirect()->route('home');
        }
    }
    public function updateProduct(string $id)
    {
        $products = DB::table('products')
            ->find($id);
        return view('updateproduct', ['products' => $products]);
    }
    public function updateP(Request $req, $id)
    {
        $products = DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $req->name,
                'discriptions' => $req->discription
            ]);

        if ($products) {
            return redirect()->route('home');
        }
    }
}
