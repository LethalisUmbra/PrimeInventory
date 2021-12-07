<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Rifle;
use App\Models\UserRifle;

use Auth;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('show', 'edit', 'update');
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('user.create', ['user' => new User]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('user.index')->with('status', __('The user was successfully created'));
    }

    public function show(User $user)
    {
        if (Auth::user()->id == $user->id || Auth::user()->is_admin)
        {
            return view('user.show', ['user' => $user]);
        }
        else
        {
            abort(404);
        }
    }

    public function edit(User $user)
    {
        if (Auth::user()->id == $user->id || Auth::user()->is_admin)
        {
            if($user->is_admin && Auth::user()->id != $user->id)
            {
                abort(403);
            }
            return view('user.edit', ['user' => $user]);
        }
        else
        {
            abort(404);
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if (Hash::check($request->password, $user->password) || Auth::user()->id != $user->id)
        {
            $user->name = $request->name;
            $user->slug = Str::slug($request->name);
            $user->email = $request->email;
            $user->save();
            return redirect()->route('user.show', $user)->with('status', __('The user was successfully updated'));
        }
        else
        {
            return redirect()->route('user.edit', $user)->with('error', __('The provided password does not match your current password.'));
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('status', __('The user was successfully deleted'));
    }
}
