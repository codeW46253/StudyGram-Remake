<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Log In
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

	return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }

    // Show Log In Form
    public function showLoginForm() {
        return view('auth.login');
    }

    // Register
    public function register(Request $request) {
        // Validate Input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'phone'    => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create user
        $user = User::create([
             'name'         => $request->name,
             'email'        => $request->email,
             'phone'        => $request->phone,
             'password'     => Hash::make($request->password),
             'isAdmin'      => false,
             'isModderator' => false,
        ]);

        // Auto-login after registration
        Auth::login($user);
        return redirect('dashboard');

        // Redirect to login form
        //return redirect('login');
    }

    // Show Registration Form
    public function showRegisterForm() {
        return view('auth.register');
    }

    // Log Out
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
