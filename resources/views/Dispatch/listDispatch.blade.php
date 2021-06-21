@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="/addDispatch/{{Auth::user()->locationnow}}" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add Dispatch Report</span>
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List Dispatch</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Pick Up</th>
                        <th>Task Id</th>
                        <th>Kurir</th>
                        <th>Tipe Mobile</th>
                        <th>Minggu Ke-</th>
                        <th>Total Berat</th>
                        <th>Total Biaya</th>
                        <th>Jarak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispatch as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nopickup}}</td>
                            <td>{{$item->taskid}}</td>
                            <td>{{$item->kurir}}</td>
                            <td>{{$item->tipe_mobil}}</td>
                            <td>{{$item->minggu}}</td>
                            <td>{{$item->total_berat}} kg</td>
                            <td>{{$item->total_biaya}}</td>
                            <td>{{$item->jarak}} km</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection