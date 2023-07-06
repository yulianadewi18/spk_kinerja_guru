@extends('layout.auth')

@section('title', 'Login')

@push('css')
<style>
    .form-control-user {
        border-radius: 5px!important;
    }   
</style>
@endpush
@section('content')
<div class="login-box">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5" style="margin-bottom: 120px">
                                    <div class="text-center">
                                        <h5 class="text-gray-900 mb-5">SPK - Penilaian Kinerja Guru<br>SD AL – BAITUL AMIEN JEMBER</h5>
                                    </div>
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
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-6 col-xl-6 text-right">
                                                <button type="submit" class="btn btn-sm btn-primary">Login</button>
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
    </div>
</div>
@endsection