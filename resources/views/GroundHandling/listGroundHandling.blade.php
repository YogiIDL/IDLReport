@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="/addUser/{{Auth::user()->locationnow}}" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add GroundHandling Report</span>
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List GroundHandling</h5>
    </div>
    <div class="card-body">
	    List GroundHandling
    </div>
</div>

@endsection