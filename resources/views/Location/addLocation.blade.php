@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Add Area</h1>
    </div>

    <div>
        <form action="{{url('addLocation')}}" method="POST">
            {{csrf_field()}}
            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location_name" id="location_name" placeholder="Location...">
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="area_id">Area Id</label>
                    <input type="text" class="form-control" name="area_id" id="area_id" placeholder="Area Id...">
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


    </div>
@endsection