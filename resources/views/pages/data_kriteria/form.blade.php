@extends('layout.master')

@section('title', 'Tambah Kriteria')
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <form action="{{ route('store_kriteria') }}" method="POST">
            @csrf
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Kode Kriteria</label>
                            <input type="text" class="form-control" name="kode_kriteria">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nama Kriteria</label>
                            <input type="text" class="form-control" name="nama_kriteria">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Bobot Kriteria</label>
                            <input type="number" class="form-control" name="bobot_kriteria">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-sm btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection