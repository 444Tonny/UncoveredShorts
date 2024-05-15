<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CredentialsController extends Controller
{
    public function indexEditor()
    {
        return view('admin.credentials');
    }

    public function editPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('adminCredentials')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('email', 'tucker.dona@gmail.com')->first();
        
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        if (Hash::check($currentPassword, $user->password)) {
            $user->update(['password' => Hash::make($newPassword)]);
            return redirect()->route('adminCredentials')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->route('adminCredentials')->with('error', 'Current password is incorrect.');
        }
    }
}
