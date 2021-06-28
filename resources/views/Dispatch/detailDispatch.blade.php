@extends('layouts.app')

@section('content')

<div class="d-flex flex-row">
    <div class="p-2">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="/listDispatch/{{Auth::user()->locationnow}}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Back to List</span>
            </a>
        </div>
    </div>
    <div class="ml-auto p-2">
        <a href="/downloadDispatch/{{Auth::user()->locationnow}}/{{$dispatch->task_id}}" class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
            <span class="text">Download Report</span>
        </a> 
    </div>
</div>

<div class="card shadow mb-4 text-gray-900">
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
        </div>

        <div class="form row">
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control" name="task_name" id="task_name" value="{{$dispatch->tanggal}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="nama_kurir">Minggu</label>
                    <input type="text" class="form-control" name="task_id" id="task_id" value="{{$dispatch->minggu}}" placeholder="Task ID">
                </div>
            </div>
        </div>
        <div class="form row">
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="nama_kurir">Kurir</label>
                    <input type="text" class="form-control" name="nama_kurir" id="nama_kurir" value="{{$dispatch->nama_kurir}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="tipe_mobil">Tipe Mobil</label>
                    <input type="text" class="form-control" name="tipe_mobil" id="tipe_mobil" value="{{$dispatch->tipe_mobil}} - {{$dispatch->nopol}}" placeholder="Task ID">
                </div>
            </div>
        </div>

        <div class="form row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-gray-900" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Awb</th>
                                <th>Berat</th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dispatch->packageList as $item)
                                <tr>
                                    <td>{{$item->no_awb}}</td>
                                    <td>{{$item->berat_awb}}</td>
                                    <td>Rp. {{$item->cost}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form row">
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="total_berat">Total Berat</label>
                    <input type="text" class="form-control" name="total_berat" id="total_berat" value="{{$dispatch->total_berat}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="total_biaya">Total Biaya</label>
                    <input type="text" class="form-control" name="total_biaya" id="total_biaya" value="{{$dispatch->total_biaya}}" placeholder="Task ID">
                </div>
            </div>
        </div>

        <div class="form row">
            <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="biayaperkilo">Cost Per Kilo</label>
                    <input type="text" class="form-control" name="biayaperkilo" id="biayaperkilo" value="{{$dispatch->biayaperkilo}}" placeholder="Task ID">
                </div>
            </div>
            {{-- <div class="form-group col-md-6">
                <div class="col-md-12">
                    <label for="total_biaya">Total Biaya</label>
                    <input type="text" class="form-control" name="total_biaya" id="total_biaya" value="{{$dispatch->total_biaya}}" placeholder="Task ID">
                </div>
            </div> --}}
        </div>

        <div class="form row">
            <div class="form-group col-md-3">
                <div class="col-sm-12">
                    <label for="bensin">Bensin</label>
                    <input type="text" class="form-control" name="bensin" id="bensin" value="{{$dispatch->bensin}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="col-sm-12">
                    <label for="parkir">Parkir</label>
                    <input type="text" class="form-control" name="parkir" id="parkir" value="{{$dispatch->parkir}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="col-sm-12">
                    <label for="tol">Tol</label>
                    <input type="text" class="form-control" name="tol" id="tol" value="{{$dispatch->tol}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="col-sm-12">
                    <label for="lainlain">Lain-lain</label>
                    <input type="text" class="form-control" name="lainlain" id="lainlain" value="{{$dispatch->lainlain}}" placeholder="Task ID">
                </div>
            </div>
        </div>

        <div class="form row">
            <div class="form-group col-md-4">
                <dv class="col-sm-12">
                    <label for="km_awal">Km Awal</label>
                    <input type="text" class="form-control" name="km_awal" id="km_awal" value="{{$dispatch->km_awal}}" placeholder="Task ID">
                </dv>
            </div>
            <div class="form-group col-md-4">
                <div class="col-sm-12">
                    <label for="km_isi">Km Isi</label>
                    <input type="text" class="form-control" name="km_isi" id="km_isi" value="{{$dispatch->km_isi}}" placeholder="Task ID">
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="col-sm-12">
                    <label for="km_akhir">Km Akhir</label>
                    <input type="text" class="form-control" name="km_akhir" id="km_akhir" value="{{$dispatch->km_akhir}}" placeholder="Task ID">
                </div>
            </div>
        </div>

    </div>
</div>

@endsection