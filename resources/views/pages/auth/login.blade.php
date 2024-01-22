@extends('layout.auth')

@section('title', 'Login')

@push('css')
<style>
    body{
        background: #f6f9ff;
    }
    .form-control-user {
        border-radius: 5px!important;
    }   
    .align-self-end {
        -ms-flex-item-align: end!important;
        align-self: flex-end!important;
    }
    img {
        vertical-align: middle;
        border-style: none;
            float: left;
    }
    .img-fluid {
        max-width:150%;
    }
</style>
@endpush
@section('content')
<div class="login-box">
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">
                    <div class="col-md-5 d-flex flex-column justify-content-center" >
                        <div class="card border-0 shadow-lg">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row px-3">
                                    <div class="col-3 align-self-end">
                                        <img src="{{ asset('login.jpg') }}" alt="login" class="img-fluid">
                                    </div>
                                    <div class="col-9">
                                        <h6 class="text-gray-900 pt-4 px-4 pb-2">Sistem Pendukung Keputusan <br>
                                             Penilaian Kinerja Guru<br>
                                             <b>SD AL – BAITUL AMIEN <br>JEMBER</b></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        @if (session('message'))
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                                </div>
                                            </div>
                                        @endif
                                        <form class="user" action="{{ route('login.process') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="Username">Username</label>
                                                <input type="text" name="username" class="form-control form-control-user form-sm" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" name="password" class="form-control form-control-user form-sm" placeholder="Password">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection