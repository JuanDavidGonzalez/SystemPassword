@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Password</h3>
                    </div>
                    <form method="POST" action="{{route('passwords.update', $password->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title:*</label>
                                        <input type="text" value="{{$password->title}}" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                                        @error ('title')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password:*</label>
                                        <input type="text" value="{{$password->password}}" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
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
                                        <input type="url" value="{{$password->url}}" name="url" class="form-control @error('url') is-invalid @enderror" id="url">
                                        @error ('url')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" value="{{$password->username}}" name="username" class="form-control @error('username') is-invalid @enderror" id="username">
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
                                                  id="note" rows="3"> {{$password->note}}
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
