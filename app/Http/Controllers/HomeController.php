<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function rootHome()
    {
        return view('rootaccount.index');
    }
    public function employeHome()
    {
        return view('employeaccount.index');
    }
}
