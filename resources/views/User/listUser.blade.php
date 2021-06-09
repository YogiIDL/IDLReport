@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="/addUser" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add New User</span>
    </a>
</div>

{{-- Search User in Table (will be fixed later) --}}
{{-- <script>
    function searchUser(){
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('searchUser');
        filter = input.value.toUpperCase();
        table = document.getElementById('userTable');
        tr = table.getElementsByTagName('tr');

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script> --}}
{{-- <div class="card shadow mb-4">
    <input type="text" id="searchUser" onkeyup="searchUser()" placeholder="Search Username..." title="Type Name">
</div> --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weigth-bold text-primary">List User</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="userTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>User email</th>
                        <th>Level</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    {{-- @php
                        dump($user)
                    @endphp --}}
                    
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->level}}</td>
                        <td>{{$user->location}}</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection