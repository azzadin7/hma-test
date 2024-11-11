<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $colors = Theme::all();
        $theme = Theme::where('theme_status', 1)->first();

        if(!Auth::check()){
            return redirect()->route('get.login');
        }

        $name = Auth::user()->name;

        return view('fileupload', compact('menus', 'name', 'colors', 'theme'));
    }

    public function updateTheme(Theme $theme)
    {
        // Set active theme to inactive
        $current = Theme::where('theme_status', 1)->update(['theme_status' => 0]);

        // Set selected theme to active
        $theme->theme_status = 1;
        $theme->save();

        return redirect()->back()->with('success', 'Tema berhasil diupdate');
    }

    public function updateLogo(Request $request)
    {   
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads/logos'), $logoName);

        $logo = File::where('');
    }
}
