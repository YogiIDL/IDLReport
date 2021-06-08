@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Add User</h1>
    </div>

    <div>
        <form action="{{url('addUser')}}" method="POST">
            {{csrf_field()}}
            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="usernmae" placeholder="Username...">
                </div>
                <div class="form-group col-md-4"></div>
            </div>
            
            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="email">User Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="User Email...">
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="User Password...">
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