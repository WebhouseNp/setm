<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function changepassword()
    {
        return view('profile::profile');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string|min:6|max:20',
            'password' => 'required|min:6|max:20|confirmed',
        ]);
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->current_password, $request->password) == 0) {

            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        try {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with("success", "Password changed successfully !");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
