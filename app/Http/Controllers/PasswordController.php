<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_class = User::class;

        $teams = $user->teams->pluck('id');
        $team_class = Team::class;


        $own_passwords = DB::table('passwords')->
                            where('owner_id', '=', $user_id)
                            ->select('passwords.id',
                                        'passwords.title',
                                        DB::raw('\'Owner\' as shared'),
                                        'passwords.created_at'
                                 );
        $team_passwords = DB::table('passwords')
            ->join('passwordables',  function ($join) use($teams, $team_class) {
                $join->on('passwords.id', '=', 'passwordables.password_id')
                    ->whereIn('passwordables.passwordable_id', $teams)
                    ->where('passwordables.passwordable_type', '=', $team_class);
            })->select('passwords.id',
                'passwords.title',
                DB::raw('\'Shared\' as shared'),
                'passwords.created_at'
            );


        $passwords = DB::table('passwords')
                 ->join('passwordables',  function ($join) use($user_id, $user_class) {
                     $join->on('passwords.id', '=', 'passwordables.password_id')
                         ->where('passwordables.passwordable_id', '=', $user_id)
                         ->where('passwordables.passwordable_type', '=', $user_class);
                 })->select('passwords.id',
                                    'passwords.title',
                                    DB::raw('\'Shared\' as shared'),
                                    'passwords.created_at'
                )
                ->union($own_passwords)
                ->union($team_passwords)
                ->orderBy('created_at')
                ->paginate(10);

        return view('passwords.index', compact('passwords'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        $teams = Team::pluck('name', 'id');

        return view('passwords.create', compact('users', 'teams'));
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

        $password->users()->attach($request->users);
        $password->teams()->attach($request->teams);

        return redirect(route('passwords.index'))->with('success', 'Password Created Successfully');
    }

    public function edit(Password $password)
    {
        $users = User::pluck('name', 'id');
        $teams = Team::pluck('name', 'id');
        return view('passwords.edit', compact('password', 'users', 'teams'));
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

        $password->users()->sync($request->users);
        $password->teams()->sync($request->teams);

       return  redirect(route('passwords.index'))->with('success', 'Password Updated Successfully');
    }


    public function show(Password $password)
    {
        return view('passwords.show', compact('password'));
    }
}
