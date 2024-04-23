<?php

namespace App\Http\Controllers;

use App\Models\user;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $result = User::all();
        // dd($result); 
        return view('content.dashboard.dashboards-analytics', ['collection' => $result]);

    }


    public function create()
    {
        UserController::index();
        // return view('createuser');
    }


    public function store(Request $request)
    {

        // dd($request->image);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('usersprofile'), $imageName);
        // dd($request->all());
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->image = $imageName;
        $user->password = $request->password;
        $user->save();

        // return redirect()->route('dashboard');
        return back();
        // dd($user);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
