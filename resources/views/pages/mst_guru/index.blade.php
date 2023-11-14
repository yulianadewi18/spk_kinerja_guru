@extends('layout.master')

@section('title', 'Data Guru')

@push('css')
    <link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">
        <div class="mb-2">
            <a href="{{ route('create_guru') }}" class="btn btn-sm btn-primary">Tambah Guru</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($alamien as $guru)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->nipa }}</td>
                            <td>{{ $guru->email }}</td>
                            <td>{{ $guru->kabupaten }}</td>
                            <td>{{ $guru->nohp1 }}</td>
                            <td class="text-center">
                            <a href="{{ route('edit_guru', ['id' => $guru->nama]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('delete_guru', ['nama' => $guru->nama]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data guru?')">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ url('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush