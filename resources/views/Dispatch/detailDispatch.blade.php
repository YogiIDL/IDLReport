@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">Detail Dispatch</h5>
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
                        <th>No Awb</th>
                        <th>Berat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispatch->packageList as $item)
                        <tr>
                            <td>{{$item->no_awb}}</td>
                            <td>{{$item->berat_awb}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection