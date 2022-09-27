@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <form method="POST" action="{{route('users.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name:*</label>
                                        <input type="text" value="{{old('name', $user->name)}}" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                                        @error ('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:*</label>
                                        <input type="email" value="{{old('email', $user->email)}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                                        @error ('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password:*</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                        @error ('password')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Confirm Password:*</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password">
                                        @error ('password')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role:*</label>
                                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                                            <option value="-1" selected disabled>-- Select --</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}" {{ (old('role', $user->roles->first()?->name) == $role->name)?'selected':''}}>
                                                    {{$role->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error ('role')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
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
