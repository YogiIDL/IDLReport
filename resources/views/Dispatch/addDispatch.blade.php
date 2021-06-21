@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weigth-bold text-primary">Add Dispatch</h5>
            </div>
            <div class="card-body">
                {{-- Search Report with API --}}
                <div class="row">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="kurir" class="form-control">Nama Kurir</label>
                        <input type="text">
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>

@endsection