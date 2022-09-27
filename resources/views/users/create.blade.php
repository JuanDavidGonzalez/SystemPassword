@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <form method="POST" action="{{route('users.create')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name:*</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                               value="{{old('name')}}">
                                        @error ('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:*</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                               value="{{old('email')}}">
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
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                               value="{{old('password')}}">
                                        @error ('password')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Confirm Password:*</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password"
                                               value="{{old('password_confirmation')}}">
                                        @error ('password')
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
