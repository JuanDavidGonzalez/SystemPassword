<?php

namespace App\Http\Controllers;

use App\Models\Team;
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
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams|max:100'
        ]);

        $team = new Team();
        $team->fill($request->all());
        $team->save();

        return redirect(route('teams.index'))->with('success', 'Team Created Successfully!');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Team $team, Request $request)
    {
        $request->validate([
            'name' => "required|unique:teams,name,$team->id|max:100"
        ]);

        $team->fill($request->all());
        $team->update();

        return redirect(route('teams.index'))->with('success', 'Team Updated Successfully!');
    }

}
