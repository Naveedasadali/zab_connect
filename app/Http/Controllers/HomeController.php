<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index()
    {
        return view('zabconnect');  // Assuming zabconnect.blade.php is your home page
    }
}
