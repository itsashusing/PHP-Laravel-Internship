<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Area;
use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\User;
use App\Models\Slider;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function loginadmin(Request $request)
    {

        $admin = Admin::where('name', $request->name)->where('email', $request->email)->where('password', $request->password)->first();
        if (!empty($admin)) {
            $request->session()->put('adminname', $admin->name);
            return redirect()->route('alluser');

        } else {
            return back()->withSuccess("Wrong credentials.");
        }
    }
    public function logout(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $request->session()->forget('adminname');
            return view('admin.dashboard');

        } else {
            return view('admin.dashboard');
        }


    }
    public function alluser(Request $request)
    {
        if ($request->session()->has('adminname')) {


            $user = User::all();
            return view('allUser', ['collection' => $user]);
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }
    public function getuser(Request $request, string $id)
    {
        if ($request->session()->has('adminname')) {

            $user = User::find($id);
            return view('getuser', compact('user'));

        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }
    public function delete(Request $request, string $id)
    {
        if ($request->session()->has('adminname')) {


            $user = User::where('id', $id)->first();
            $user->delete();
            return redirect()->route('alluser');
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }
    public function edituser(Request $request)
    {



        $validatedData = $request->validate([
            'name' => 'required|string',
            'age' => 'required|numeric',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required|string|min:4',
        ]);

        $id = $request->id;
        $user = User::where('id', $id)->first();

        if ($user->password == $request->password) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //save the image
                $imageName = 'profile/' . time() . '_' . $request->image->getClientOriginalName();
                $request->image->move('profile', $imageName);
                // update the user
                $user->name = $request->name;
                $user->age = $request->age;
                $user->email = $request->email;
                $user->image = $imageName;
                $user->status = $request->status ? "1" : "0";
                $user->save();
                return back()->withSuccess('User Added successfully !!!');

            } else {
                $user->name = $request->name;
                $user->age = $request->age;
                $user->email = $request->email;
                $user->status = $request->status ? "1" : "0";
                $user->save();
                return back()->withSuccess('User Added successfully !!!');
            }
        } else {
            return back()->withSuccess('Password not matched !!!');
        }
    }
    public function createuser(Request $request)
    {
        // validate Data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'age' => 'required|numeric',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required|string|min:4',
            'image' => 'required|image|',

        ]);
        // Upload Image
        $imageName = 'profile/' . time() . '_' . $request->image->getClientOriginalName();
        $request->image->move('profile', $imageName);
        // Add User Data
        $user = new User;
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->password = $request->password;

        $user->save();
        return back()->withSuccess('User Added successfully !!!');


    }

    public function country(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $country = Country::all();
            return view('country', compact('country'));
        } else
            return view('admin.dashboard')->with('danger', 'Login first.');

    }
    public function addcountry(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $country = new Country;
        $country->name = $request->name;
        $country->save();

        return back()->withSuccess("Country Added successfully");
    }

    public function state(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $country = Country::all();
            $address = State::with('country')->get();
            // return $address;
            return view('state', compact('country', 'address'));
        } else
            return view('admin.dashboard')->with('success', 'Login first.');


    }
    public function addstate(Request $request)
    {

        $country = Country::all();

        $country_val = [];


        foreach ($country as $key => $value) {
            array_push($country_val, $value['id']);
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'country' => ['required', 'in:' . implode(',', $country_val)]
        ]);
        $state = new State;
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->save();
        return back()->withSuccess("State Added successfully");
    }
    public function district(Request $request, $id = null)
    {
        if ($request->session()->has('adminname')) {


            $output = "<option>Select State</option>";
            $address = District::with('state', 'state.country')->get();
            // return $address;
            $country = Country::all();
            if ($id) {
                $states = State::where('country_id', $id)->get();
                foreach ($states as $state) {
                    $output .= "<option value='" . $state['id'] . "' >" . $state['name'] . "</option>";
                }
                return $output;
            }
            return view('district', ['country' => $country, 'address' => $address]);
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }

    public function adddistrict(Request $request)
    {
        $country = Country::all();
        $states = State::all();
        $country_val = [];
        $state_val = [];
        foreach ($states as $key => $value) {
            array_push($state_val, $value['id']);
        }
        foreach ($country as $key => $value) {
            array_push($country_val, $value['id']);
        }



        $validatedData = $request->validate([
            'name' => 'required|string',
            'country' => ['required', 'in:' . implode(',', $country_val)],
            'state' => ['required', 'in:' . implode(',', $state_val)]
        ]);
        $district = new District;
        $district->country_id = $request->country;
        $district->state_id = $request->state;
        $district->name = $request->name;

        $district->save();
        return back()->withSuccess("District added successfully.");
    }

    public function area(Request $request, string $id = null)
    {
        if ($request->session()->has('adminname')) {



            $output = "<option>Select District</option>";
            $address = Area::with('countries', 'states', 'district')->get();
            $country = Country::all();

            if ($id) {
                $districts = District::where('state_id', $id)->get();
                foreach ($districts as $district) {
                    $output .= "<option value='" . $district['id'] . "' >" . $district['name'] . "</option>";
                }
                return $output;
            }

            return view('area', ['country' => $country, 'address' => $address]);

        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }

    public function addarea(Request $request)
    {
        $country = Country::all();
        $states = State::all();
        $district = District::all();
        $country_val = [];
        $state_val = [];
        $district_val = [];

        foreach ($district as $key => $value) {
            array_push($district_val, $value['id']);
        }
        foreach ($states as $key => $value) {
            array_push($state_val, $value['id']);
        }
        foreach ($country as $key => $value) {
            array_push($country_val, $value['id']);
        }



        $validatedData = $request->validate([
            'name' => 'required|string',
            'country' => ['required', 'in:' . implode(',', $country_val)],
            'state' => ['required', 'in:' . implode(',', $state_val)],
            'district' => ['required', 'in:' . implode(',', $district_val)]
        ]);

        $area = new Area;
        $area->name = $request->name;
        $area->country_id = $request->country;
        $area->state_id = $request->state;
        $area->district_id = $request->district;

        $area->save();
        return back()->withSuccess("Area saved successfully.");
    }

    public function address(Request $request)
    {
        if ($request->session()->has('adminname')) {


            $address = Area::with('countries', 'states', 'district')->get();
            // return $address;
            return view('address', compact('address'));
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }


    // slider image
    public function slider(Request $request)
    {

        if ($request->session()->has('adminname')) {
            if ($request->isMethod('post')) {
                $validatedData = $request->validate([
                    'image' => 'required',
                    'title' => 'required',
                    'discription' => 'required',
                ]);
         
                if ($request->hasFile('image')) {
                    $imageName = 'sliderimages/' . time() . '_' . $request->image->getClientOriginalName();
                    $request->image->move('sliderimages/', $imageName);
                    $slider = new Slider;
                    $slider->title = $request->title;
                    $slider->discription = $request->discription;
                    $slider->image = $imageName;
                    $slider->save();
                    return back()->withSuccess("Slider image added successfully."); 

                }
            }
            return view('sliderimage');
        } else
            return view('admin.dashboard')->with('success', 'Login first.');
    }


}