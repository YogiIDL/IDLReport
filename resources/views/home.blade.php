@extends('layouts.app')

@section('content')
<div>
    {{-- <select name="" id="" class="form-control bg-light border-0 small"> --}}
    {{-- <select name="" id="" class="">
        @foreach (Auth::user()->location as $item)
            <option value="">{{$item->location_name}}</option>
        @endforeach
    </select> --}}
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">{{ __('Dashboard') }} BTP</h5>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        {{ __('You are logged in!') }}
    </div>
</div>
<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
{{-- </div>   --}}
@endsection