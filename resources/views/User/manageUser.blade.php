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
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="user_id">Username</label>
                            {{-- <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID..."> --}}
                            <select name="user_id" id="" class="form-control">
                            <option value="" disabled selected hidden>Pilih User...</option>
                                @foreach ($user->usermaster as $i=>$item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>

                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="location_id">Location</label>
                            {{-- <input type="text" class="form-control" name="location_id" id="location_id" placeholder="Location Id..."> --}}
                            <select name="location_id" id="" class="form-control">
                            <option value="" disabled selected hidden>Pilih Lokasi...</option>
                                @foreach ($user->locationmaster as $i=>$item)
                                    <option value="{{$item->id}}">{{$item->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>

                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="task_id">Task</label>
                            {{-- <input type="text" class="form-control" name="task_id" id="task_id" placeholder="Task Id..."> --}}
                            <select name="task_id" id="" class="form-control">
                                @foreach ($user->taskmaster as $i=>$item)
                                <option value="" disabled selected hidden>Pilih Task...</option>
                                    <option value="{{$item->id}}">{{$item->task_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>

                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="level_access_id">Level Access</label>
                            {{-- <input type="text" class="form-control" name="level_access_id" id="level_access_id" placeholder="Level Access Id..."> --}}
                            <select name="level_access_id" id="" class="form-control">
                                <option value="" disabled selected hidden>Pilih Level Access...</option>
                                @foreach ($user->activitymaster as $i=>$item)
                                    <option value="{{$item->id}}">{{$item->activity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
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