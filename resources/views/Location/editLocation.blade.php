@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit Location</h5>
            </div>
            <div class="card-body">
                <form action="">                        
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value={{$location[0]->id}}>
                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location_name" id="location_name" placeholder="Location Name..." value={{$location[0]->location_name}}>
                        </div>
                        <div class="form-group col-md-2"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="type">Type</label>
                            <select name="type_id" id="">
                                <option value=""></option>
                            </select>
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