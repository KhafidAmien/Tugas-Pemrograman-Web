@extends('layouts.main')

@section('header')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

@endsection

@section('content')
                            <div class="card border-left-primary shadow h-100 py-2 px-3 mr-5">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-5">
                                        <i data-feather="user" class="text-primary" style="width: 50; height: 50;"></i>
                                            
                                        </div>
                                        <div class="col-auto">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                Mahasiswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalMahasiswa}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>                   
@endsection
