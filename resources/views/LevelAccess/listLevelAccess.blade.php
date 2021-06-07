@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Level Access Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levelAccesses as $levelAccess )
                    <tr>
                        <td>{{$levelAccess->id}}</td>
                        <td>{{$levelAccess->level_access_name}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection