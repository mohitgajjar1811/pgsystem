<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Signup;
use App\Models\Order;
use App\Models\Booking;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $orders = Order::where('uid_id', $user->id)->get();
        $bookings = Booking::where('email', $user->email)->get();
        return view('user.profile', compact('user', 'orders', 'bookings'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:user_signup,email,' . $user->id,
            'phoneno' => 'required|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $oldEmail = $user->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phoneno = $request->phoneno;
        $user->email = $request->email;

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                $oldImagePath = public_path('profile_images/' . $user->profile_image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profile_images'), $imageName);
            $user->profile_image = $imageName;
        }

        $user->save();

        // Update linked bookings if email changed to maintain the connection
        if ($oldEmail !== $user->email) {
            Booking::where('email', $oldEmail)->update(['email' => $user->email]);
        }

        return back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();
        
        // Optionally delete orders or handle them
        Order::where('uid_id', $user->id)->delete();
        
        // Delete profile image
        if ($user->profile_image) {
            $imagePath = public_path('profile_images/' . $user->profile_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Account deleted successfully');
    }
}
