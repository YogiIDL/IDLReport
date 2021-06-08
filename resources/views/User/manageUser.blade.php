@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Manage User</h1>
    </div>

    <div>
        <form action="{{url('saveManageUser')}}" method="POST">
            {{csrf_field()}}
            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="user_id">User id</label>
                    <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID...">
                    {{-- <select name="" id="">
                        @foreach (Auth::user()->usernamelist as $user)
                            <option value="">{{$user}}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="location_id">Location Id</label>
                    <input type="text" class="form-control" name="location_id" id="location_id" placeholder="Location Id...">
                    {{-- <select name="" id="">
                        @foreach (Auth::user()->locationlist as $location)
                            <option value="">{{$location}}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="task_id">Task Id</label>
                    <input type="text" class="form-control" name="task_id" id="task_id" placeholder="Task Id...">
                    {{-- <select name="" id="">
                        @foreach (Auth::user()->tasklist as $task)
                            <option value="">{{$task}}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="level_access_id">Level Access Id</label>
                    <input type="text" class="form-control" name="level_access_id" id="level_access_id" placeholder="Level Access Id...">
                    {{-- <select name="" id="">
                        @foreach (Auth::user()->activitylist as $activity)
                            <option value="">{{$activity}}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="form-group col-md-4"></div>
            </div>
            
            <div class="form row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-4">
                    <div class="col-sm-6">
                        <button class="btn btn-lg btn-primary">Simpan</button>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="col-sm-6">
                        <button class="btn btn-lg btn-secondary">Cancel</button>
                    </div>
                </div>
                <div class="form-group col-md-2"></div>
            </div>
        </form>


            <form action="">
            {{-- Example, Delete later --}}
            <div class="form row">
                <div class="form-group col-md-6">
                    <label for="kurir">Kurir</label>
                    <input type="text" class="form-control" name="kurir" id="kurir" placeholder="Nama Kurir">
                </div>
                <div class="form-group col-md-6">
                    <div class="col-sm-6">
                        <label for="nopol">No Polisi</label>
                        <input type="text" class="form-control" name="nopol" id="nopol" placeholder="No Polisi">
                    </div>
                    <div class="col-sm-6">
                        <label for="nopol">Tipe Mobil</label>
                        <input type="text" class="form-control" name="tipeMobil" id="tipeMobil" placeholder="Tipe Mobil">
                    </div>
                </div>
            </div>
            {{-- <div class="form row">
                <div class="form-group col-md-6">
                    <label for="tglAwal">Tanggal Awal</label>
                    <input type="text" class="form-control" name="tglAwal" id="tglAwal" placeholder="Tanggal Awal">
                </div>
                <div class="form-group col-md-6">
                    <label for="tgkAkhir">Tanggal Akhir</label>
                    <input type="text" class="form-control" name="tglAkhir" id="tglAkhir" placeholder="Tanggal Akhir">
                </div>
            </div> --}}

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

            <div class="table-responsive">
                <div class="col-md-6">
                    <label for="firstPickUp">First Pick Up</label>
                </div>
                <div class="col-md-6">
                    <div class="float-left addAwbFirstPickUp" id="addAwbFirstPickUp" style="cursor:pointer">
                        <label for="" style="cursor: pointer">Add AWB</label><span class="glyphicon glyphicon-plus"></span>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No AWB</th>
                            <th scope="col">Berat</th>
                        </tr>
                    </thead>
                    <tbody class="awbBodyFirstPickUp" id="awbBodyFirstPickUp">
                        <tr>
                            <th scope="row">
                                <input type="text" class="form-control" name="awbFirstPickUp[]" id="awbFirstPickUp" placeholder="AWB First Pick Up">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="beratAwbFirstPickUp[]" id="beratAwbFirstPickup" placeholder="Berat">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <div class="col-md-6">
                    <label for="handoverOutbound">Handover Out Bound</label>
                </div>
                <div class="col-md-6">
                    <div class="float-left addAwbHandoverOutbound" id="addAwbHandoverOutbound" style="cursor:pointer">
                        <label for="" style="cursor: pointer">Add AWB</label><span class="glyphicon glyphicon-plus"></span>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dard">
                        <tr>
                            <th scope="col">No AWB</th>
                            <th scope="col">Berat</th>
                        </tr>
                    </thead>
                    <tbody class="awbBodyHandoverOutbound" id="awbBodyHandoverOutbound">
                        <tr>
                            <th scope="row">
                                <input type="text" class="form-control" name="awbHandoverOutbound[]" id="awbHandoverOutbound" placeholder="AWB First Pick Up">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="beratAwbHandoverOutbound[]" id="beratAwbHandoverOutbound" placeholder="Berat">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <div class="col-md-6">
                    <label for="handoverInbound">Handover In Bound</label>
                </div>
                <div class="col-md-6">
                    <div class="float-left addAwbHandoverInbound" id="addAwbHandoverInbound" style="cursor:pointer">
                        <label for="" style="cursor: pointer">Add AWB</label><span class="glyphicon glyphicon-plus"></span>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dard">
                        <tr>
                            <th scope="col">No AWB</th>
                            <th scope="col">Berat</th>
                        </tr>
                    </thead>
                    <tbody class="awbBodyHandoverInbound" id="awbBodyHandoverInbound">
                        <tr>
                            <th scope="row">
                                <input type="text" class="form-control" name="awbHandoverInbound[]" id="awbHandoverInbound" placeholder="AWB First Pick Up">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="beratAwbHandoverInbound[]" id="beratAwbHandoverInBound" placeholder="Berat">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <div class="col-md-6">
                    <label for="delivery">Delivery</label>
                </div>
                <div class="col-md-6">
                    <div class="float-left addAwbDelivery" id="addAwbDelivery" style="cursor:pointer">
                        <label for="" style="cursor: pointer">Add AWB</label><span class="glyphicon glyphicon-plus"></span>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dard">
                        <tr>
                            <th scope="col">No AWB</th>
                            <th scope="col">Berat</th>
                        </tr>
                    </thead>
                    <tbody class="awbBodyDelivery" id="awbBodyDelivery">
                        <tr>
                            <th scope="row">
                                <input type="text" class="form-control" name="awbDelivery[]" id="awbDelivery" placeholder="AWB First Pick Up">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="beratAwbDelivery[]" id="beratAwbDelivery" placeholder="Berat">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form row">
                <div class="form-group col-md-3">
                    <label for="bensin">Bensin</label>
                    <input type="text" class="form-control" name="bensin" id="bensin" placeholder="Biaya Bensin">
                </div>
                <div class="form-group col-md-3">
                    <label for="tol">Tol</label>
                    <input type="text" class="form-control" name="tol" id="tol" placeholder="Biaya Tol">
                </div>
                <div class="form-group col-md-3">
                    <label for="parkir">Parkir</label>
                    <input type="text" class="form-control" name="parkir" id="parkir" placeholder="Biaya Parkir">
                </div>
                <div class="form-group col-md-3">
                    <label for="lainLain">Biaya Lain - Lain</label>
                    <input type="text" class="form-control" name="lainlain" id="lainLain" placeholder="Biaya Lain - Lain">
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
                <button class="btn btn-lg btn-secondary">Cancel</button>
            </div>
        </div>
        </form>  
    </div>
@endsection