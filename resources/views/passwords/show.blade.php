@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Password Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title:*</label>
                                    <input type="text" value="{{$password->title}}" name="title" class="form-control" id="title"  disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password:*</label>
                                    <input type="text" value="{{$password->password}}" name="password" class="form-control" id="password" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">Url:</label>
                                    <input type="url" value="{{$password->url}}" name="url" class="form-control" id="url" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" value="{{$password->username}}" name="username" class="form-control" id="username" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">Note:</label>
                                    <textarea type="text" name="note" class="form-control" disabled
                                              id="note" rows="3"> {{$password->note}}
                                        </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
