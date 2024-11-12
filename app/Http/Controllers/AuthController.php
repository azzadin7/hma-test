<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Define data validation rules
        $creadentials = $request->validate([
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:8'
        ]);

        // Check Credential
        if(Auth::attempt($creadentials)){
            $request->session()->regenerate();

            $id = Auth::user()->id;
            //Update status in user table to 1 (active)
            $user = User::find($id);
            $user->status = 1;
            $user->save();

            return redirect()->intended('/dashboard')->with('name', Auth::user()->name);
        }

        return redirect()->back()->with('failed','Email atau password salah! Silakan coba lagi.');
    }

    public function logout()
    {
        $id = Auth::user()->id;
        //Update status in user table to 0 (inactive)
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
