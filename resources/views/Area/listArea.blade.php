@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List Area</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
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
                            {{-- <div class="btn btn-primary">
                                <a href="/editArea/{{$area->id}}">Edit</a>
                                <span class="text">
                                    Edit
                                </span>
                            </div> --}}
                            <a href="/editArea/{{$area->id}}" class="btn btn-primary">
                                <span class="text">Edit</span>
                            </a>
                        </td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection