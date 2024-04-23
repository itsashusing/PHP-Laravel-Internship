<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SbCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $cat = Category::all();
        return view('category.addcat', compact('cat'));
    }

    public function addcategory(Request $request)
    {


        // dd($request->all());
        //saving image
        $imageName = 'category_images/' . time() . '_' . $request->image->getClientOriginalName();
        $request->image->move('category_images', $imageName);

        $cat = new Category;
        $cat->name = $request->name;
        $cat->image = $imageName;
        $cat->save();
        return back()->withSuccess('Category added successfull.');
    }


    public function sbcategory()
    {
        $cat = Category::all();
        $sbCat = SbCategory::with('catetory')->get();

        return view('category.sbcategory', compact('sbCat', 'cat'));
    }
    public function addsbcategory(Request $request)
    {


        // dd($request->all());
        //saving image
        $imageName = 'sbcategory_images/' . time() . '_' . $request->image->getClientOriginalName();
        $request->image->move('sbcategory_images', $imageName);

        $sbcat = new SbCategory();

        $sbcat->name = $request->name;
        $sbcat->categories_id = $request->category;
        $sbcat->image = $imageName;
        $sbcat->save();
        return back()->withSuccess($sbcat->name . ' added successfully.');
    }
    // Edit and Delete Categories
    public function catdelete(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {

            $cat = Category::find($id);
            $cat->delete();
            return back()->with('success', "$cat->name deleted successfully.");
        }
        return view('admin.dashboard');
    }

    public function editcat(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {

            if ($request->isMethod('put')) {
                $cat = Category::find($id);
                if ($request->hasFile('image')) {
                    $imageName = 'category_images/' . time() . '_' . $request->image->getClientOriginalName();
                    $request->image->move('category_images', $imageName);
                    $cat->name = $request->name;
                    $cat->image = $imageName;
                    $cat->save();
                    return back()->with('success', "$cat->name updated Successfully.");
                } else {
                    $cat->name = $request->name;
                    $cat->save();
                    return back()->with('success', "$cat->name updated Successfully.");
                    // return $cat;
                }
            } else {
                $cat = Category::find($id);

                return view('category.editcat', compact('cat'));
            }
        }
        return view('admin.dashboard');
    }
    public function sbcatdelete(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {

            $sbcat = SbCategory::find($id);
            $sbcat->delete();
            return back()->with('success', "$sbcat->name deleted successfully.");
        }
        return view('admin.dashboard');
    }
    public function editsbcat(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {

            if ($request->isMethod('put')) {
                $sbcat = SbCategory::find($id);
                if ($request->hasFile('image')) {
                    $imageName = 'sbcategory_images/' . time() . '_' . $request->image->getClientOriginalName();
                    $request->image->move('sbcategory_images', $imageName);
                    $sbcat->name = $request->name;
                    $sbcat->categories_id = $request->category;
                    $sbcat->image = $imageName;
                    $sbcat->save();
                    return back()->with('success', "$sbcat->name updated Successfully.");
                } else {
                    $sbcat->name = $request->name;
                    $sbcat->categories_id = $request->category;
                    // return $sbcat;
                    $sbcat->save();
                    return back()->with('success', "$sbcat->name updated Successfully.");
                    // return $cat;
                }
            } else {
                $sbcat = SbCategory::find($id);
                $cat = Category::all();
                return view('category.editsbcat', compact('cat', 'sbcat'));
            }
        }
        return view('admin.dashboard');
    }
}
