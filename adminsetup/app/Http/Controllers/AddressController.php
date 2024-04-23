<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Country;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function countryeditpage(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {


            $country = Country::find($id);
            return view('editcountry', compact('country'));
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }
    public function editcountry(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $country = Country::find($request->id);
            $country->name = $request->name;
            $country->save();
            return back()->with('success', "$country->name updated successfully.");
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }

    public function countrydelete(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {


            $country = Country::find($id);
            $country->delete();
            return back()->withSuccess("$country->name deleted successfully.");
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }
    public function statedelete(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {


            $country = State::find($id);
            $country->delete();
            return back()->withSuccess("$country->name deleted successfully.");
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }

    public function stateeditpage(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {


            $state = State::find($id);
            $country = Country::all();
            // return $state . $country;
            return view('editstate', compact('state', 'country'));
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }


    public function editstate(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $state = State::find($request->id);
            $state->name = $request->name;
            $state->country_id = $request->country;
            $state->save();
            return back()->with('success', "$state->name updated successfully.");
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }

    // District
    public function districtdelete(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {


            $district = District::find($id);
            $district->delete();
            return back()->withSuccess("$district->name deleted successfully.");
        } else
            return view('admin.dashboard')->with('danger', 'Login first.');
    }

    public function districteditpage(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {

            $district = District::find($id);
            $state = State::all();
            $country = Country::all();
            // return $state . $country;
            return view('editdistrict', compact('state', 'country', 'district'));
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }

    public function editdistrict(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $district = District::find($request->id);
            $district->name = $request->name;
            $district->country_id = $request->country;
            $district->state_id = $request->state;
            $district->save();
            return back()->with('success', "$district->name updated successfully.");
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }


    // Area
    public function areadelete(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {


            $area = Area::find($id);
            $area->delete();
            return back()->withSuccess("$area->name deleted successfully.");
        } else
            return view('admin.dashboard')->with('danger', 'Login first.');
    }
    public function areaeditpage(Request $request, $id)
    {
        if ($request->session()->has('adminname')) {

            $area = Area::find($id);

            $country = Country::all();
            // return $state . $country;
            return view('editarea', compact('country', 'area'));
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }
    public function editarea(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $area = Area::find($request->id);
            $area->name = $request->name;
            $area->country_id = $request->country;
            $area->state_id = $request->state;
            $area->district_id = $request->distict;
            $area->save();
            return back()->with('success', "$area->name updated successfully.");
        } else
            return view('admin.dashboard')->with('success', 'Login first.');

    }
}
