@extends('layout.master')

@section('title', 'Data Pengguna')

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
                <a href="{{ route('create_pengguna') }}" class="btn btn-sm btn-primary">Tambah Pengguna</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="tableUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
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
        table = $('#tableUser').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('data_pengguna') }}",
            "language": {
                "emptyTable": "Tidak ada pengguna."
            },
            columnDefs: {
                "targets": [4],
                "className": "dt-body-right"
            },
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'name', name:'name'},
                {data:'username', name:'username'},
                {data:'roles', name:'roles'},
                {data:'action', name:'action'},
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
                $.post(url,{
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