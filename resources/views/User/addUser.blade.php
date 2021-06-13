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
                <form action="{{url('addUser')}}/{{Auth::user()->locationnow}}" method="POST">
                {{-- <form action="addUser/{{Auth::user()->locationnow}}" method="POST"> --}}
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
                    
                    {{-- Testing Level option in user input base on level --}}
                    {{-- @php
                        dump(Auth::user()->level);
                        dump($level);
                        foreach ($level as $item) {
                            dump($item->id);
                        }
                    @endphp --}}

                    <div class="form-group col-md-12">
                        <label for="level">Level</label>
                        {{-- <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID..."> --}}
                        <select name="level" id="" class="form-control">
                            <option value="" disabled selected hidden>Pilih Level...</option>
                            @foreach ($level as $item)
                                @if (Auth::user()->level == "1")
                                    <option value="{{$item->id}}">{{$item->level_name}}</option>
                                @elseif (Auth::user()->level == "2")
                                    @if ($item->id != "1" && $item->id != "2") 
                                        <option value="{{$item->id}}">{{$item->level_name}}</option>
                                    @endif
                                @endif
                            @endforeach
                            {{-- @foreach ($level as $i=>$item)
                                <option value="{{$item->id}}">{{$item->level_name}}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="location" id="password" placeholder="User Password...">
                            {{-- <input type="password" class="form-control" name="password" id="password" placeholder="User Password..."> --}}
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>

                    <div class="form row col-md-12">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="location">Location</label>
                            <select name="location_id" id="" class="form-control">
                                <option value="" disabled selected hidden>Pilih Location...</option>
                                @foreach ($location as $item)
                                    <option value="{{$item->id}}">{{$item->location_name}} - {{$item->area_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-4"></div> --}}
                    </div>

                    <div class="form row">
                        {{-- <div class="form-group col-md-4"></div> --}}
                        <div class="form-group col-md-12">
                            <label for="task">Task</label>
                            <div class=" row">
                                @foreach ($task as $item)
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="task[]" value="{{$item->id}}">
                                        <label for="dispatch"> {{$item->task_name}}</label>
                                    </div>
                                @endforeach
                                {{-- <div class="col-sm-4">
                                    <input type="checkbox" name="task[]" value="1">
                                    <label for="dispatch"> Dispatch</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="task[]" value="2">
                                    <label for="traffic"> Traffic</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="task[]" value="3">
                                    <label for="groundHandling">Ground Handling</label>
                                </div> --}}
                            </div>
                            {{-- <input type="password" class="form-control" name="password" id="password" placeholder="User Password..."> --}}
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
                                {{-- <button class="btn btn-lg btn-secondary">Cancel</button> --}}
                                <a href="/listUser" class="btn btn-lg btn-secondary">Cancel</a>
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