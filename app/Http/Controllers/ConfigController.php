<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Menu;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $colors = Theme::all();
        $theme = Theme::where('theme_status', 1)->first();
        $logo = File::where('file_type', 'logo')->first();
        $logopath = 'uploads/' . $logo->file_path;

        if(!Auth::check()){
            return redirect()->route('get.login');
        }

        $name = Auth::user()->name;

        return view('fileupload', compact('menus', 'name', 'colors', 'theme', 'logo', 'logopath'));
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
            'file' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        // $logo = File::where('file_type', 'logo')->first();

        // if($logo->file_path){
        //     Storage::delete('public/' . $logo->file_path);
        // }

        $file = $request->file('file');
        $logoName = time() . '-' . $file->getClientOriginalName();
        // $request->logo->storeAs('public', $logoName);

        $path = $file->storeAs('logos', $logoName);
        
        $logo = File::where('file_type', 'logo')
                    ->update([
                        'file_path' => $path
                    ]);

        return redirect()->back()->with('success', 'Logo berhasil diperbarui.');
    }
}
