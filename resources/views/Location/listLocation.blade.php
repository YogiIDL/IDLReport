@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="/addLocation" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add New Location</span>
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List Location</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    @php
                        $i = 1;
                    @endphp
                    <tr>
                        <th>#</th>
                        <th>Location Name</th>
                        <th>Type</th>
                        <th>Area Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location )
                    <tr>
                        {{-- <td>{{$location->id}}</td> --}}
                        <td>{{$i++}}</td>
                        <td>{{$location->location_name}}</td>
                        <td>{{$location->type_name}}</td>
                        <td>{{$location->area_name}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection