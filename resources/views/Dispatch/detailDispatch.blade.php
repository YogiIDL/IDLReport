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

    <div class="form row">
        <div class="form-group col-md-6">
                <label for="nama_kurir">Nama Kurir</label>
                <input type="text" class="form-control" name="task_id" id="task_id" value="{{$dispatch->nama_kurir}}" placeholder="Task ID">
        </div>
        <div class="form-group col-md-6">
            <div class="col-md-12">
                <label for="tanggal">Tanggal</label>
                <input type="text" class="form-control" name="task_name" id="task_name" value="{{$dispatch->tanggal}}" placeholder="Task ID">
            </div>
        </div>
    </div>
    <div class="form row">
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
</div>

@endsection