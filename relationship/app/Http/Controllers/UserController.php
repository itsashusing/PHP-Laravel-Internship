<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function exportusers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');

    }
    public function import(Request $request)
    {
        // return $request->all();


        Excel::import(new UsersImport, $request->file('file'));
        return back();

    }
}
