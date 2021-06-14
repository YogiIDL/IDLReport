@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Add Activity</h5>
            </div>
            <div class="card-body">
                <form action="{{url('addActivity')}}/{{Auth::user()->locationnow}}" method="POST">
                    {{csrf_field()}}
                    <div class="form row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label for="level_access">Activity Name</label>
                            <input type="text" class="form-control" name="name" id="level_access_name" placeholder="Level Access Name...">
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