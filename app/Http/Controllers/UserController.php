<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Theme;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //=======================================
    //=== Functions untuk menampilkan view
    //=======================================

    public function getUsers()
    {
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $users = User::all();
        $theme = Theme::where('theme_status', 1)->first();

        if (!Auth::check()) {
            return redirect()->route('get.login');
        }  

        $name = Auth::user()->name;

        return view('userManagement.list', compact('menus', 'users', 'name', 'theme'));
    }

    public function getUserById()
    {

    }

    public function searchUser(Request $request)
    {   
        $query = $request->input('query');

        $result = User::where('name', 'LIKE ', '%' . $query . '%')->orWhere('email', 'LIKE', '%' . $query . '%')->get();

        return response()->json($result);
    }

    public function addUserForm()
    {
        $title = 'Tambah Pengguna';
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $theme = Theme::where('theme_status', 1)->first();

        if (!Auth::check()) {
            return redirect()->route('get.login');
        }  

        $name = Auth::user()->name;

        return view('userManagement.form', compact('menus', 'name', 'title', 'theme'));
    }

    public function updateUserForm($id)
    {
        $title = 'Edit Pengguna';
        $user = User::findOrFail($id);
        $menus = Menu::orderBy('menu_order', 'asc')->get();
        $theme = Theme::where('theme_status', 1)->first();

        if (!Auth::check()) {
            return redirect()->route('get.login');
        }  

        $name = Auth::user()->name;

        return view('userManagement.form', compact('user', 'menus', 'name', 'title', 'theme'));
    }


    //================================
    //=== Funtion untuk proses data 
    //================================

    public function addUser(Request $request)
    {
        // Validate User Input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // Insert new user into database using Eloquent
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);

        // // Insert new user into database using Eloquent
        // User::create([
        //     'user_fullname' => $request->name,
        //     'user_email' => $request->email,
        //     'user_password' => Hash::make($request->password),
        //     'user_status' => 0 // Set default value as 0 (Non-Active User)
        // ]);

        return redirect()->route('view.user')->with('success', 'User has been added successfully!');
    }

    public function updateUser(Request $request, $userId)
    {
        // Validate User Input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8'
        ]);

        return response()->json(['message' => 'Hello Bro']);

        $user = User::findOrFail($userId);
        // Insert new user into database using Eloquent
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // // Insert new user into database using Eloquent
        // $user->update([
        //     'user_fullname' => $request->name,
        //     'user_email' => $request->email,
        //     'user_password' => Hash::make($request->password)
        // ]);

        return redirect()->route('view.user')->with('success', 'User has been updated successfully!');
    }

    public function deleteUSer(User $user)
    {
        $user->delete();

        return redirect()->route('view.user')->with('success', 'User has been deleted successfully!');
    }
}
