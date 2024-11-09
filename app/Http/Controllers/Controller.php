<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
