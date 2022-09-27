<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(5);

        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $users = User::all();

        return view('teams.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams|max:100',
            'users' => 'required|min:1',
        ]);

        $team = new Team();
        $team->fill($request->all());
        $team->save();

        $team->users()->attach($request->users);

        return redirect(route('teams.index'))->with('success', 'Team Created Successfully!');
    }

    public function edit(Team $team)
    {
        $users = User::all();

        return view('teams.edit', compact('team', 'users'));
    }

    public function update(Team $team, Request $request)
    {
        $request->validate([
            'name' => "required|unique:teams,name,$team->id|max:100",
            'users' => 'required|min:1',
        ]);

        $team->fill($request->all());
        $team->update();
        $team->users()->sync($request->users);

        return redirect(route('teams.index'))->with('success', 'Team Updated Successfully!');
    }

}
