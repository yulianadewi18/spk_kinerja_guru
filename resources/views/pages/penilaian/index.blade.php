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
                <table class="table table-bordered table-sm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th class="text-center">Alternatif</th>
                            <th class="text-center" width="50%">Kriteria</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaian as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->guru->alternatif['nama_guru'] }}</td>
                            <td>{{ $item->kriteria['nama_kriteria'] }}</td>
                            <td class="text-center">{{ $item->subKriteria['sub_kriteria'] }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
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