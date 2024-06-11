<?php

// Marlina

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->intended('/');
    }

    public function register(Request $request)
    {
        try {
            User::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'email'  => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error, ' . $e->getMessage());
        }

        return redirect()->intended('/login');
    }

    public function authenticate()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Error while trying to connect.')->onlyInput('email');
    }
}
