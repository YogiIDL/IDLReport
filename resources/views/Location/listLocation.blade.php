@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Location Name</th>
                        <th>Area Id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location )
                    <tr>
                        <td>{{$location->id}}</td>
                        <td>{{$location->location_name}}</td>
                        <td>{{$location->area_id}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection