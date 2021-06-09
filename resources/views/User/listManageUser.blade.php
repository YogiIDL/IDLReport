@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="/manageUser" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add New Manage</span>
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List User</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Id</th>
                        <th>Username</th>
                        {{-- <th>Location Id</th> --}}
                        <th>Location Name</th>
                        {{-- <th>Task Id</th> --}}
                        <th>Task Name</th>
                        {{-- <th>Activity Id</th> --}}
                        <th>Activity Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manageUsers as $manageUser )
                    {{-- @php
                        dump($user)
                    @endphp --}}
                    
                    <tr>
                        <td>{{$manageUser->id}}</td>
                        <td>{{$manageUser->user_id}}</td>
                        <td>{{$manageUser->name}}</td>
                        {{-- <td>{{$manageUser->location_id}}</td> --}}
                        <td>{{$manageUser->location_name}}</td>
                        {{-- <td>{{$manageUser->task_id}}</td> --}}
                        <td>{{$manageUser->task_name}}</td>
                        {{-- <td>{{$manageUser->activity_id}}</td> --}}
                        <td>{{$manageUser->activity_name}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection