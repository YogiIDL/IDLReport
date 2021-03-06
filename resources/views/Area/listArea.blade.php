@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="/addArea/{{Auth::user()->locationnow}}" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add New Area</span>
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List Area</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{'success'}}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-gray-900" width="100%" cellspacing="0">
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
                        {{-- <td class="text-right"> --}}
                        <td>
                            <div class="form row">
                                <div class="col-sm-2">
                                    <a href="/editArea/{{Auth::user()->locationnow}}/{{$area->id}}" class="btn btn-primary">
                                        <span class="text">Edit</span>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <form method="POST" action="/deleteArea/{{Auth::user()->locationnow}}/{{$area->id}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value={{$area->id}}>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
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