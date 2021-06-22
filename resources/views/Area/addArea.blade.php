@extends('layouts.app')

@section('content')
<div class="row">
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
    <a href="/listArea/{{Auth::user()->locationnow}}" class="btn btn-info btn-icon-split">
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
                <h5 class="m-0 font-weight-bold text-primary">Add Area</h5>
            </div>
            <div class="card-body">
                <form action="{{url('addArea')}}/{{Auth::user()->locationnow}}" method="POST">
                    {{csrf_field()}}
                    <div class="form row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" name="area" id="area" placeholder="Area...">
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
                                <input type="reset" value="Cancel" class="btn btn-lg btn-secondary">
                                {{-- <button class="btn btn-lg btn-secondary">Cancel</button> --}}
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