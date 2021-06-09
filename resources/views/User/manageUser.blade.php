@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Manage User</h5>
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>

@endsection