<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Hash;
use Auth;

class PasswordController extends Controller
{
    public function index(){
        return view('backend.password.index');
    }
    public function update(Request $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password Kamu tidak cocok.");
        }

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan Password yang baru.");
        }

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("info","Password berhasil diubah!");
    }
    
}
