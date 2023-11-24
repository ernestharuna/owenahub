<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'min:2', 'max:20'],
            'last_name' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()]
        ]);

        /**
         * @var User $user
         */

        try {
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            Auth::login($user);
            return redirect(route('user.dashboard'))->with('status', 'Welcome!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            throw $e;
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        try {
            if (Auth::attempt($data, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(route('user.dashboard'))->with('status', 'Login Successful');
            };

            return back()->withErrors([
                'email' => 'Invalid credentials'
            ])->onlyInput('email');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerate();

            return redirect(route('user.login'))->with('status', "Logout successful!");
        } catch (\Exception $e) {
            throw $e;
            return back()->with('error', $e->getMessage());
        }
    }
}
