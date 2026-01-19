<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function index() {}

    public function update(Request $request, User $user) {
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        if (Auth::user()->isAdmin && $request->adminControl == 1) {
            $isModerator = $request->has('moderator');

            $user->update([
                'name'=> $request->input('name'),
                'phone'=> $request->input('phone'),
                'email'=> $request->input('email'),
                'isModderator' => $isModerator,
            ]);
        } else {
            $user->update([
                'name'=> $request->input('name'),
                'phone'=> $request->input('phone'),
                'email'=> $request->input('email'),
            ]);
        }


        return redirect()->back()->with("success","Account Updated Successfully");
    }

    public function updatePassword(Request $request, User $user) {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $user->password = Hash::make( $request->password );
        $user->save();

        return redirect()->back()->with("success","Password Reset Successfully");
    }

    public function showUserAccPage()
    {
        return view('user_account');
    }

    public function destroy(Request $request, $id)
    {
        // Confirm admin password
        if (!Hash::check($request->input('password'), Auth::user()->password))
        {
            return back()->withErrors(['password' => 'Invalid admin password.']);
        }
        
        // Find and delete user
        $user = User::findOrFail($id);
        $user->delete();
        
        return back()->with('success', 'User deleted successfully.');
    }
}
