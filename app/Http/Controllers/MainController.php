<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $countTotalUser = User::count();
        $countActiveUser = User::where('status', 1)->count();

        if(!Auth::check()){
            return redirect()->route('get.login');
        }

        $name = Auth::user()->name;

        return view('dashboard', compact('menus', 'countTotalUser', 'countActiveUser', 'name'));
    }

    public function config()
    {
        $menus = Menu::orderBy('menu_order', 'asc')->get();

        if(!Auth::check()){
            return redirect()->route('get.login');
        }

        $name = Auth::user()->name;

        return view('fileupload', compact('menus', 'name'));
    }

}