import os
import shutil

# Update config/auth.php to use Signup model
auth_path = "laravel_app/config/auth.php"
try:
    with open(auth_path, "r") as f:
        auth_content = f.read()

    auth_content = auth_content.replace(
        "'model' => env('AUTH_MODEL', App\\Models\\User::class),",
        "'model' => env('AUTH_MODEL', App\\Models\\Signup::class),"
    )

    with open(auth_path, "w") as f:
        f.write(auth_content)
    print("Updated config/auth.php successfully.")
except FileNotFoundError:
    print(f"{auth_path} not found. Skipped.")


# Create AuthController
auth_controller = """<?php

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
"""
os.makedirs("laravel_app/app/Http/Controllers", exist_ok=True)
with open("laravel_app/app/Http/Controllers/AuthController.php", "w") as f:
    f.write(auth_controller)
print("Created AuthController successfully.")
