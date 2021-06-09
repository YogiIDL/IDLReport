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
                        <th>Location Name</th>
                        {{-- <th>Area Id</th> --}}
                        <th>Area Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location )
                    <tr>
                        <td>{{$location->id}}</td>
                        <td>{{$location->location_name}}</td>
                        {{-- <td>{{$location->area_id}}</td> --}}
                        <td>{{$location->area_name}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection