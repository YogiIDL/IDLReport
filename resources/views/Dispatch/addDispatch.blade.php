@extends('layouts.app')

@section('content')
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

                <form action="">
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
                            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-md-12">
                            <label for="Minggu">Minggu ke:</label>
                            <input type="text" class="form-control" name="minggu" id="minggu" placeholder="Minggu ke-">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col-md-6">
                            <label for="noPickUp">No Pick Up</label>
                            <input type="text" class="form-control" name="noPickUp" id="noPickUp" placeholder="No Pick Up">
                        </div>                    
                        <div class="form-group col-md-6">
                            <div class="col-md-12">
                                <label for="taskId">Task ID</label>
                                <input type="text" class="form-control" name="taskId" id="taskId" placeholder="Task ID">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col-md-6">
                            <label for="flow">Task Name</label>
                            <input type="text" class="form-control" name="task_name" id="taskName" value="{{$response->flow}}" placeholder="Task ID">
                        </div>
                    </div>
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

                </form>

            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

@endsection