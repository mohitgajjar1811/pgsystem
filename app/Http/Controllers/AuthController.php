<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Signup;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Signup::where('email', $credentials['email'])->first();

        if ($user) {
            // STEP 1: Check if password is still plain text
            // If needsRehash is true (which a plain text string is) and it matches exactly
            if (Hash::needsRehash($user->password) && $user->password === $credentials['password']) {
                $user->password = Hash::make($credentials['password']);
                $user->save();
            }

            // STEP 2: Standard attempt
            if (Auth::guard('web')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                session(['is_login' => true]);
                session(['userid' => $user->id]);
                
                if ($user->is_admin) {
                     return redirect()->intended('/admin');
                }
                
                return redirect()->intended('/');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loadlogin');
    }
}
