@extends('layouts.app')

@section('content')
<div class="row">
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
    <a href="/listDispatch/{{Auth::user()->locationnow}}" class="btn btn-info btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back to List</span>
    </a>
</div>

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weigth-bold text-primary">Add Dispatch</h5>
            </div>
            <div class="card-body">
                {{-- Search Report with API --}}
                <div class="row">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <form action="/saveDispatch/{{Auth::user()->locationnow}}" method="POST" class="text-gray-900 font-weight-bold">
                    {{ csrf_field() }}
                    <div class="form row">
                        <div class="form-group col-lg-6">
                            <label for="kurir">Nama Kurir</label>
                            <input type="text" class="form-control" name="nama_kurir" value="{{$response->taskAssignedTo}}" placeholder="Nama Kurir">
                        </div>
                        <div class="form-group col-lg-6 d-flex flex-row">
                            <div class="col-sm-6">
                                <label for="kurir">No Polisi</label>
                                <input type="text" class="form-control" name="nopol" placeholder="Nomor Polisi">
                            </div>
                            <div class="col-sm-6">
                                <label for="kurir">Tipe Mobil</label>
                                <input type="text" class="form-control" name="tipe_mobile" placeholder="Tipe Mobil">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col-md-6">
                            <label for="tgl">Tanggal</label>
                            <input type="text" class="form-control" name="tgl" id="tgl" value="{{$response->taskCreatedTime}}" placeholder="Tanggal">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-md-12">
                            <label for="Minggu">Minggu ke:</label>
                            <input type="text" class="form-control" name="minggu" id="minggu" placeholder="Minggu ke-">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        {{-- <div class="form-group col-md-6">
                            <label for="noPickUp">No Pick Up</label>
                            <input type="text" class="form-control" name="noPickUp" id="noPickUp" placeholder="No Pick Up">
                        </div>                     --}}
                        <div class="form-group col-md-6">
                            {{-- <div class="col-md-12"> --}}
                                <label for="taskId">Task ID</label>
                                <input type="text" class="form-control" name="taskId" id="taskId" value="{{$response->taskId}}" placeholder="Task ID">
                            {{-- </div> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-md-12">
                                <label for="flow">Task Name</label>
                                <input type="text" class="form-control" name="task_name" id="taskName" value="{{$response->flow}}" placeholder="Task ID">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form row">
                        <div class="form-group col-md-6">
                            <label for="flow">Task Name</label>
                            <input type="text" class="form-control" name="task_name" id="taskName" value="{{$response->flow}}" placeholder="Task ID">
                        </div>
                    </div> --}}
                    @foreach ($response->UserVar["packageList"] as $item)
                        <div class="form row">
                            <div class="form-group col-md-6">
                                <label for="awb">No AWB</label>
                                <input type="text" class="form-control" name="noAwb[]" id="noAwb" value="{{$item["connote_code"]}}" placeholder="Task ID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="awb">Berat AWB</label>
                                <input type="text" class="form-control" name="beratAwb[]" id="beratAwb" value="{{$item["koli_weight"]}}" placeholder="Task ID">
                            </div>
                        </div>
                    @endforeach

                    <div class="form row">
                        <div class="form-group col-md-3">
                            <label for="bensin">Bensin</label>
                            <input type="text" class="form-control" name="bensin" id="bensin" placeholder="Bensin...">
                        </div>                    
                        <div class="form-group col-md-3">
                            <div class="col-md-12">
                                <label for="tol">Tol</label>
                                <input type="text" class="form-control" name="tol" id="tol" placeholder="Tol">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="parkir">Parkir</label>
                            <input type="text" class="form-control" name="parkir" id="parkir" placeholder="Parkir">
                        </div>                    
                        <div class="form-group col-md-3">
                            <div class="col-md-12">
                                <label for="lainlain">Biaya Lain-lain</label>
                                <input type="text" class="form-control" name="lainlain" id="lainlain" placeholder="Biaya Lain-lain...">
                            </div>
                        </div>
                    </div>

                    <div class="form row">
                        <div class="form-group col-md-4">
                            <label for="kmAwal">Km. Awal</label>
                            <input type="text" class="form-control" name="kmAwal" id="kmAwal" placeholder="Km. Awal">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kmIsi">Km. Isi</label>
                            <input type="text" class="form-control" name="kmIsi" id="kmIsi" placeholder="Km. Isi">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kmAkhir">Km. Akhir</label>
                            <input type="text" class="form-control" name="kmAkhir" id="kmAkhir" placeholder="Km. Akhir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-lg btn-primary">Simpan</button>
                        </div>
                        <div class="col-sm-6">
                            {{-- <button class="btn btn-lg btn-secondary">Cancel</button> --}}
                            <input type="reset" value="Cancel" class="btn btn-lg btn-secondary">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

@endsection