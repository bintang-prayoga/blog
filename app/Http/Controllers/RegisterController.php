<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('login.register', [
            'title' => 'Trial Blog | Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users', 'email:dns'],
            'username' => ['required', 'unique:users', 'min:3', 'max:10'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if (User::create($validatedData)) {
            $request->session()->flash('success', 'Registration successfull. Please login.');
            return redirect('/login');
        } else {
            $request->session()->flash('error', 'Registration failed. Please try again.');
            return redirect('/register');
        }
    }
}
