@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('teams.index')}}">Teams</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Team</h3>
                    </div>
                    <form method="POST" action="{{route('teams.update', $team->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Team Name:</label>
                                <input type="text" name="name" value="{{old('name', $team->name)}}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name">
                                @error ('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="users">Users:*</label>
                                <select name="users[]"  class="form-control @error("users") is-invalid @enderror" id="users" multiple>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{in_array($user->id, $team->users->modelKeys())?'selected':''}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error ('users')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
