@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Passwords</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Passwords List</h3>
                        <div class="card-tools">
                            <a href="{{route('passwords.create')}}" class="btn btn-primary btn-sm" title="Create New Password" >
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($passwords as $password)
                                    <tr>
                                        <td>{{$password->id}}</td>
                                        <td>{{$password->title}}</td>
                                        <td>{{$password->created_at}}</td>
                                        <td>
                                            <a href="{{route('passwords.show', $password->id)}}" class="btn btn-primary btn-xs" title="show"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('passwords.edit', $password->id)}}" class="btn btn-warning btn-xs" title="Edit"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $passwords->links('pagination::bootstrap-4') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
