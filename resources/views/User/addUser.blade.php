@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Add new User</h5>
            </div>
            <div class="card-body">
                <form action="{{url('addUser')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="usernmae" placeholder="Username...">
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>
            
                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="email">User Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="User Email...">
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>

                    <div class="form-group col-md-12">
                        <label for="level">Level</label>
                        {{-- <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID..."> --}}
                        <select name="level" id="" class="form-control">
                            <option value="staff" selected>Pilih Level...</option>
                            @foreach ($level as $item)
                                <option value="{{$item->level_name}}">{{$item->level_name}}</option>
                            @endforeach
                            {{-- @foreach ($user->usermaster as $i=>$item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="User Password...">
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