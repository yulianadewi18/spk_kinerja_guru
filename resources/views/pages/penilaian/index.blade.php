@extends('layout.master')

@section('title', 'Data Nilai Alternatif')

@push('css')
    <link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <div class="mb-2">
                <a href="{{ route('create_penilaian') }}" class="btn btn-sm btn-primary">Tambah Nilai Alternatif</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Periode</th>
                            <th>Alternatif</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2023</td>
                            <td>Guru 1</td>
                            <td>Kriteria 1</td>
                            <td>Nilai</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ url('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush