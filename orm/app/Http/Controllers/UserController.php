<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function exportuser()
    {
        return Excel::download(new UsersExport, 'userdata.xlsx');
    }
    public function importuser(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file'));
    }
}
