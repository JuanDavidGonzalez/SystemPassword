<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function index()
    {
        $passwords = Password::paginate(5);

        return view('passwords.index', compact('passwords'));
    }

    public function create()
    {
        return view('passwords.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:passwords|string|max:100',
            'password' => 'required',
            'url' => 'nullable|url',
            'note' => 'nullable|max:255',
        ]);

        $password = new Password();
        $password->fill($request->all());
        $password->owner_id = Auth::id();
        $password->save();

        return redirect(route('passwords.index'))->with('success', 'Password Created Successfully');
    }

    public function edit(Password $password)
    {
        return view('passwords.edit', compact('password'));
    }

    public function update(Password $password, Request $request)
    {
        $request->validate([
            'title' => "required|unique:passwords,title,$password->id|string|max:100",
            'password' => 'required',
            'url' => 'nullable|url',
            'note' => 'nullable|max:255',
        ]);

        $password->fill($request->all());
        $password->update();

       return  redirect(route('passwords.index'))->with('success', 'Password Updated Successfully');
    }


    public function show(Password $password)
    {
        return view('passwords.show', compact('password'));
    }
}
