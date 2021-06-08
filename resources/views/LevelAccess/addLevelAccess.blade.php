@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Add Area</h1>
    </div>

    <div>
        <form action="{{url('addLevelAccess')}}" method="POST">
            {{csrf_field()}}
            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="level_access">Level Access Name</label>
                    <input type="text" class="form-control" name="name" id="level_access_name" placeholder="Level Access Name...">
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