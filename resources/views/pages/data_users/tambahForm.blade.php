@extends('layout.master')

@section('title', 'Tambah Guru')

@push('css')
    <style>
        .card-footer{
            display: flex;
        }
    </style>
@endpush
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <form action="{{ route('store_pengguna') }}" method="POST">
            @csrf
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                            <small class="text-danger">{{ $errors->first('name')}}</small>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}">
                            <small class="text-danger">{{ $errors->first('username')}}</small>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            <small class="text-danger">{{ $errors->first('password')}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">Kembali</a>
                <button class="btn btn-sm btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection