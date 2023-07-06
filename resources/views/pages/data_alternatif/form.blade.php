@extends('layout.master')

@section('title', 'Tambah Bobot')
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <form action="">
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Nama Bobot</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Kriteria</label>
                            <select name="" id="" class="form-control">
                                <option value="">Kriteria 1</option>
                                <option value="">Kriteria 2</option>
                            </select>
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