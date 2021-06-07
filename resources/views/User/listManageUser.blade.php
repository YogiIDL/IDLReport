@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Id</th>
                        <th>Location Id</th>
                        <th>Task Id</th>
                        <th>Level Access Id</th>
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
                        <td>{{$manageUser->location_id}}</td>
                        <td>{{$manageUser->task_id}}</td>
                        <td>{{$manageUser->level_access_id}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection