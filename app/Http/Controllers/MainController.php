<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\File;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $countTotalUser = User::count();
        $countActiveUser = User::where('status', 1)->count();
        $theme = Theme::where('theme_status', 1)->first();
        $logo = File::where('file_type', 'logo')->first();
        $logopath = 'uploads/' . $logo->file_path;

        if(!Auth::check()){
            return redirect()->route('get.login');
        }

        $name = Auth::user()->name;

        return view('dashboard', compact('menus', 'countTotalUser', 'countActiveUser', 'name', 'theme', 'logo', 'logopath'));
    }

}