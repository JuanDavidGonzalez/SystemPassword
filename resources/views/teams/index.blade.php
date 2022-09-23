@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Teams</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Teams List</h3>
                        <div class="card-tools">
                            <a href="{{route('teams.create')}}" class="btn btn-primary btn-sm" title="Create New Team" >
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->id}}</td>
                                        <td>{{$team->name}}</td>
                                        <td>{{$team->created_at}}</td>
                                        <td>
                                            <a href="{{route('teams.edit', $team->id)}}" class="btn btn-warning btn-xs" title="Edit"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $teams->links('pagination::bootstrap-4') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
