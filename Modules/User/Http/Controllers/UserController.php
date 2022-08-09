<?php

namespace Modules\User\Http\Controllers;

use App\Mail\UserRegistraionEmail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users  = User::where('id', '!=', 1)->get();
        return view('user::index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user::create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:6|max:20',
            'email' => 'required|email|min:6|max:50|unique:users',
            'password' => 'required|min:6|max:20|confirmed',
            // 'branch' => 'required|integer',
            'role' => 'required',
        ]);
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now();
            $user->publish = $request->publish ? 1 : 0;
            $user->save();
            $user->assignRole($request->role);
            // Mail::to($user->email)->send(new UserRegistraionEmail($request->name, $request->email, $request->password));
            return redirect()->route('user.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        return view('user::show');
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all();
        return view('user::edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|min:6|max:20',
            'email' => 'required|email|min:6|max:50|unique:users,id,' . $user->id,
            // 'branch' => 'required|integer',
            'role' => 'required'
        ]);
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->publish = $request->publish ? 1 : 0;
            $user->save();
            $user->syncRoles($request->role);
            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User removed successfully');
    }
}
