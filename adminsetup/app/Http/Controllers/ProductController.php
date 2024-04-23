<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SbCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::with('category', 'sub_category', 'productimages')->get();
        // return $product;

        return view('product.products', compact('product'));
    }
    public function addproducts(Request $request, $id = null)
    {
        if ($request->session()->get('adminname')) {
            $cat = Category::all();
            if ($request->isMethod('POST')) {

                if ($request->hasFile('image1')) {
                    $imageName = 'productimages/main/' . time() . '_' . $request->image1->getClientOriginalName();
                    $request->image1->move('productimages/main/', $imageName);
                }

                $product = new Product;
                $product->name = $request->name;
                $product->discriptions = $request->discription;
                $product->price = $request->price;
                $product->quantity = $request->quantity;
                $product->image = $imageName;
                $product->category_id = $request->category;
                $product->subcategory_id = $request->subcategory;
                $product->save();
                // Get the Product Id
                $product_id = $product->id;
                if ($request->hasFile('image2')) {
                    foreach ($request->file('image2') as $image) {

                        $imageName2 = 'productimages/second/' . time() . '_' . $image->getClientOriginalName();
                        $image->move('productimages/second/', $imageName2);
                        $productImage = new ProductImage;
                        $productImage->images = $imageName2;
                        $productImage->product_id = $product_id;
                        $productImage->save();
                    }
                }

                return back()->with('success', "$product->name added successfully.");
            }
            if ($id) {

                $output = " <option>Select Sub Category</option>";
                $sbcat = SbCategory::where('categories_id', $id)->get();
                foreach ($sbcat as $item) {
                    $output .= " <option value='$item->id'>$item->name</option>";
                }
                return $output;
            }
            return view('product.addproducts', compact('cat'));
        } else {
            return view('admin.dashboard');
        }
    }
}
