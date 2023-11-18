@extends('layout.master')

@if (!empty($alternatif))
@section('title', 'Edit Alternatif')
@else
@section('title', 'Tambah Alternatif')
@endif
    
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all(); as $item)
                <li>{{ $item}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card border-top-primary shadow mb-4">
    @if (!empty($alternatif))
        <form action="{{ url('data-alternatif/update').$alternatif->id }}" method="POST">
        @else
        <form action="{{ url('data-alternatif/store') }}" method="POST">
        @endif
        @csrf
            <input type="hidden" class="form-control" name="id" @if(!empty($alternatif)) value="{{ $alternatif->id }}" @endif>
            <div class="card-body pt-3">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Kode Alternatif</label>
                            <input type="text" class="form-control" name="kode_alternatif" @if(!empty($alternatif)) value="{{ $alternatif->kode_alternatif }}" @else value="{{ Session::get('nama_alternatif') }}" @endif>
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nama Alternatif</label>
                            <input type="text" class="form-control" name="nama_alternatif" @if(!empty($alternatif)) value="{{ $alternatif->nama_alternatif }}" @else value="{{ Session::get('nama_alternatif') }}" @endif>
                        </div>
            <div class="card-footer justify-content-between" style="display: flex">
                <a href="{{ route('data_alternatif') }}" class="btn btn-sm btn-warning">Kembali</a>
                @if (!empty($alternatif))
                <button class="btn btn-sm btn-primary">Update</button>
                @else
                <button class="btn btn-sm btn-primary">Tambah</button>
                @endif
            </div>
        </form>
    </div>
@endsection