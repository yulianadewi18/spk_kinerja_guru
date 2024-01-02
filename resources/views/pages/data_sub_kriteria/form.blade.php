@extends('layout.master')

@if (!empty($kriteria))
@section('title', 'Edit Sub Kriteria')
@else
@section('title', 'Tambah Sub Kriteria')
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
    @if (!empty($subkriteria))
    <form action="{{ url('data-sub-kriteria/update').$subkriteria->id }}" method="POST">
        <input type="hidden" class="form-control" name="id" @if(!empty($subkriteria)) value="{{ $subkriteria->id }}" @endif>
        @else
        <form action="{{ url('data-sub-kriteria/store') }}" method="POST">
            @endif
            @csrf
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Sub Kriteria</label>
                            <input type="text" class="form-control" name="sub_kriteria" @if(!empty($subkriteria)) value="{{ $subkriteria->sub_kriteria }}" @else value="{{ Session::get('bobot') }}" @endif>
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Bobot </label>
                            <input type="number" class="form-control" name="bobot" @if(!empty($subkriteria)) value="{{ $subkriteria->bobot }}" @else value="{{ Session::get('bobot') }}" @endif>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-between" style="display: flex">
                <a href="{{ route('data_sub_kriteria') }}" class="btn btn-sm btn-warning">Kembali</a>
                @if (!empty($subkriteria))
                <button class="btn btn-sm btn-primary">Update</button>
                @else
                <button class="btn btn-sm btn-primary">Tambah</button>
                @endif
            </div>
        </form>
</div>
@endsection