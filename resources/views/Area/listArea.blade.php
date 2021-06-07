@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Area Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area )
                    <tr>
                        <td>{{$area->id}}</td>
                        <td>{{$area->area_name}}</td>
                        <td>
                            <div class="btn btn-secondary">
                                <a href="/editArea/{{$area->id}}">Edit</a>
                            </div>
                        </td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection