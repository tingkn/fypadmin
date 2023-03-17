<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generateReport()
    {
        $users = DB::table('users')->select('id', 'name', 'email')->get();

        return view('report', ['users' => $users]);
    }

}
