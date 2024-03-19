@extends('layout.master')

@section('title', 'Data Guru')

@push('css')
<link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">  
        <div class="mb-2">
            <a href="{{ route('create_guru') }}" class="btn btn-sm btn-primary">Tambah Guru</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelGuru" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="2%">No</th>
                        <th width="20%">Nama Guru</th>
                        <th width="8%">Jenis Kelamin</th>
                        <th width="10%">NIPA</th>
                        <th width="10%">TTL</th>
                        <th width="10%">NRG</th>
                        <th width="5%">Jenis Guru</th>
                        <th width="5%">Tugas Guru</th>
                        <th width="12%">Alamat</th>
                        <th width="10%">Telepon</th>
                        <th class="text-center" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
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

<script>
    //TAMPIL DATA
    let table;
    table = $('#tabelGuru').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data_guru') }}",
        "language": {
            "emptyTable": "Data Guru kosong."
        },
        columnDefs: [{
            targets: 6,
            className: 'text-center'
        }],
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama_guru',
                name: 'nama_guru'
            },
            {
                data: 'gender',
                name: 'gender'
            },
            {
                data: 'nipa',
                name: 'nipa'
            },
            {
                data: 'ttl',
                name: 'ttl'
            },
            {
                data: 'nrg',
                name: 'nrg'
            },
            {
                data: 'jns_guru',
                name: 'jns_guru'
            },
            {
                data: 'tugas',
                name: 'tugas'
            },
            {
                data: 'jalan',
                name: 'jalan'
            },
            {
                data: 'nohp',
                name: 'nohp'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
    });

    function deleteData(url) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            timer: 2000
                        })
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data tidak dapat dihapus!',
                        })
                        return;
                    })
            }
        })
    }
</script>
@endpush