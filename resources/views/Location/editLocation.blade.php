@extends('layouts.app')

@section('content')

<div class="row">
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
    <a href="/listLocation/{{Auth::user()->locationnow}}" class="btn btn-info btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back to List</span>
    </a>
</div>

@if(count($errors) > 0)
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-body">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endif

@if(session('success'))
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-body">
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endif

@if(session('error'))
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-body">
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endif
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit Location</h5>
            </div>
            <div class="card-body">
                <form action="/editLocation/{{Auth::user()->locationnow}}/{{$location[0]->id}}" method="POST">                        
                {{-- <form action="/editArea/{{Auth::user()->locationnow}}/{{$area[0]->id}}" method="POST"> --}}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value={{$location[0]->id}}>
                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location_name" id="location_name" value="{{$location[0]->location_name}}">
                        </div>
                        <div class="form-group col-md-2"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="type">Type</label>
                            <select name="type_id" id="" class="form-control">
                                <option value="{{$location[0]->type_id}}" selected hidden>{{$location[0]->type_name}}</option>
                                @foreach ($type as $item)
                                    {{-- <option value={{$item->id}}>{{$item->type_name}}</option> --}}
                                    <option value="{{$item->id}}">{{$item->type_name}}</option>
                                    {{-- <option value=1>{{$item->type_name}}</option> --}}
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="type">Area</label>
                            <select name="area_id" id="" class="form-control">
                                <option value={{$location[0]->area_id}} selected hidden>{{$location[0]->area_name}}</option>
                                @foreach ($area as $item)
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
                                {{-- <button class="btn btn-lg btn-secondary">Cancel</button> --}}
                                <input type="reset" value="Cancel" class="btn btn-lg btn-secondary">
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