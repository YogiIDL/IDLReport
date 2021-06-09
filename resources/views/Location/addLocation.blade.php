@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Add New Location</h5>
            </div>
            <div class="card-body">
                <form action="{{url('addLocation')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location_name" id="location_name" placeholder="Location...">
                        </div>
                        <div class="form-group col-md-2"></div>
                    </div>

                    <div class="form row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="area_id">Area Id</label>
                            {{-- <input type="text" class="form-control" name="area_id" id="area_id" placeholder="Area Id..."> --}}
                            <select name="area_id" id="" class="form-control" >
                                <option value="" disabled selected hidden>Pilih Area</option>
                                @foreach ($area as $i=>$item)
                                    <option value="{{$item->id}}">{{$item->area_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
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
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endsection