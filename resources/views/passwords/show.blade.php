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
                                    <label for="title">Title:</label>
                                    <input type="text" value="{{$password->title}}" name="title" class="form-control" id="title"  disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="password">Password:</label>
                                    <div class="input-group">
                                        <input type="password" value="{{$password->password}}" name="password" class="form-control" id="password" readonly>
                                        <div class="input-group-append" id="togglePassword">
                                            <a class="input-group-text bg-warning" title="show">
                                                <span class="fas fa-eye" id="pass-icon"></span>
                                            </a>
                                        </div>
                                        <div class="input-group-append" id="copyPassword">
                                            <a class="input-group-text bg-primary" title="Copy">
                                                <span class="fas fa-copy"></span>
                                            </a>
                                        </div>
                                    </div>
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

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const copyPassword = document.querySelector('#copyPassword');
        const password = document.querySelector('#password');
        const icon = document.querySelector('#pass-icon');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            icon.classList.toggle('fa-eye-slash');
        });

        copyPassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type');
            if(type === "password"){
                password.setAttribute('type', 'text');
            }
            password.select();
            document.execCommand("copy");
            password.setAttribute('type', type);
        });

    </script>
@endsection
