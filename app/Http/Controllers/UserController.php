<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'not_in:-1'],
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->assignRole($request->role);
        $user->save();

        return redirect(route('users.index'))->with('success', 'User Created Successfully');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id"],
            'password' => ['nullable'],
            'role' => ['required', 'not_in:-1'],
        ]);

        $user->fill($request->all());
        $user->syncRoles($request->role);

        if($request->input('password'))
            $user->password = Hash::make($request->input('password'));

        $user->update();

        return redirect(route('users.index'))->with('success', 'User Updated Successfully');

    }
}
