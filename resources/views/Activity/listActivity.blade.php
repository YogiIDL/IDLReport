@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
{{-- <div class="row"> --}}
    <a href="/addActivity/{{Auth::user()->locationnow}}" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add Activity</span>
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List Activity</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Activity Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity as $item )
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->activity_name}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection