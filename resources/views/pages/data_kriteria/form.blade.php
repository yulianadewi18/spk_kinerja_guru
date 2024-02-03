@extends('layout.master')

@if (!empty($kriteria))
@section('title', 'Edit Kriteria')
@else
@section('title', 'Tambah Kriteria')
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
    @if (!empty($kriteria))
    <form action="{{ url('data-kriteria/update').$kriteria->id }}" method="POST">
        <input type="hidden" class="form-control" name="id" @if(!empty($kriteria)) value="{{ $kriteria->id }}" @endif>
        @else
        <form action="{{ url('data-kriteria/store') }}" method="POST">
            @endif
            @csrf
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Kode Kriteria</label>
                            <input type="text" class="form-control" name="kode_kriteria" @if(!empty($kriteria)) value="{{ $kriteria->kode_kriteria }}" @else value="{{ Session::get('nama_kriteria') }}" @endif>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nama Kriteria</label>
                            <input type="text" class="form-control" name="nama_kriteria" @if(!empty($kriteria)) value="{{ $kriteria->nama_kriteria }}" @else value="{{ Session::get('nama_kriteria') }}" @endif>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Sifat Kriteria</label>
                            <select class="form-control dataGuru" name="sifat">
                                <option value="benefit" @if (!empty($kriteria)) {{ ($kriteria->sifat == 'benefit') ? 'selected' : '' }} @endif>Benefit</option>
                                <option value="cost" @if (!empty($kriteria)) {{ ($kriteria->sifat == 'cost') ? 'selected' : '' }} @endif>Cost</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Bobot Kriteria</label>
                            <input type="number" class="form-control" name="bobot_kriteria" @if(!empty($kriteria)) value="{{ $kriteria->bobot_kriteria }}" @else value="{{ Session::get('bobot_kriteria') }}" @endif>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-between" style="display: flex">
                <a href="{{ route('data_kriteria') }}" class="btn btn-sm btn-warning">Kembali</a>
                @if (!empty($kriteria))
                <button class="btn btn-sm btn-primary">Update</button>
                @else
                <button class="btn btn-sm btn-primary">Tambah</button>
                @endif
            </div>
        </form>
</div>
@endsection