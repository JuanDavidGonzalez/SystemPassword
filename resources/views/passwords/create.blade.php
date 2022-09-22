@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Password</h3>
                    </div>
                    <form method="POST" action="{{route('passwords.create')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title:*</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                                        @error ('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password:*</label>
                                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                        @error ('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">Url:</label>
                                        <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" id="url">
                                        @error ('url')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username">
                                        @error ('username')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="note">Note:</label>
                                        <textarea type="text" name="note" class="form-control @error('note') is-invalid @enderror"
                                                  id="note" rows="3">
                                        </textarea>
                                        @error ('note')
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
