@extends('layouts.app')

@section('content')
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
                        <th>Username</th>
                        <th>User email</th>
                        <th>Level</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    {{-- @php
                        dump($user)
                    @endphp --}}
                    
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->level}}</td>
                        <td>{{$user->location}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection