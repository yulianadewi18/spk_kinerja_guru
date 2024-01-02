@extends('layout.master')

@if (!empty($alternatif))
@section('title', 'Edit Alternatif')
@else
@section('title', 'Tambah Alternatif')
@endif

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__placeholder{
            color: #495057;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 18px;
        }
        .select2-container--default .select2-selection--single{
            padding: 0.35rem .75rem;
        }
    </style>
@endpush
    
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
            <input type="hidden" class="form-control" name="id" value="{{ $alternatif->id }}">
            @else
            <form action="{{ url('data-alternatif/store') }}" method="POST">
            @endif
            @csrf
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Kode Alternatif</label>
                            <input type="text" class="form-control" name="kode_alternatif" @if(!empty($alternatif)) value="{{ $alternatif->kode_alternatif }}" @else value="{{ Session::get('kode_alternatif') }}" @endif>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nama Alternatif</label>
                            <select class="form-control dataGuru" name="id_guru">
                                <option value=""></option>
                                @foreach ($guru as $teach)
                                <option value="{{ $teach->id }}" @if (!empty($alternatif)) {{ ($alternatif->id_guru == $teach->id) ? 'selected' : '' }} @endif>{{ $teach->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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

@push('js')
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dataGuru').select2({
                placeholder: 'Pilih Alternatif'
            });
        });
    </script>
@endpush