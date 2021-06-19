{{-- @foreach ($area as $item)
    {{$item->id}}
@endforeach --}}

{{$area[0]->id}}
{{$area[0]->area_name}}

@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Edit Area</h1>
    </div>

    <div>
        {{-- <form action="{{url('')}}" method="POST"> --}}
        {{-- <form action="{{url('editArea/{{$area->id}}')}}" method="POST"> --}}
        {{-- <form action="editArea/{{$area->id}}" method="POST"> --}}
        {{-- <form action="{{url('')}}" method="POST"> --}}
        {{-- <form action="{{url('')}}" method="POST"> --}}
        <form action="/editArea/{{Auth::user()->locationnow}}/{{$area[0]->id}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{$area[0]->id}}>
            <div class="form row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="area">Area</label>
                    <input type="text" class="form-control" name="area_name" id="area_name" placeholder="Area Name..." value={{$area[0]->area_name}}>
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