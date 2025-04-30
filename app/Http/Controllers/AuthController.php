<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptcha;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function showDashboard()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => [new ReCaptcha()]
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard.index')->with('success', 'Registration successful!');
        } catch (Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred during registration. Please try again.')->withInput();
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard.index')->with('success', 'Giriş başarılı!');
            } else {
                return back()->with('error', 'Geçersiz e-posta veya şifre.');
            }
        } catch (Exception $e) {
            Log::error('Login failed: ' . $e->getMessage());
            return back()->with('error', 'Giriş yaparken bir hata oluştu. Lütfen tekrar deneyin.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Successfully logged out');
    }
}
