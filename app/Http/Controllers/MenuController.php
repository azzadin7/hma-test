<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function getMenus()
    {
        $menus = Menu::all();
        return view('navbar', compact('menus'));
    }
}
