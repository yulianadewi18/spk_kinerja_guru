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
                    @if(session('user_id') != 1)
                    @if(session('user_id') == $item->id_admin)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->alternatif->guru['nama_guru'] }}</td>
                        <td>{{ $item->kriteria['nama_kriteria'] }}</td>
                        <td class="text-center">{{ $item->subKriteria['sub_kriteria'] }}</td>
                        <td class="text-center">
                            <a href="{{ route('edit_penilaian', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="deletePenilaian({{ $item->id }})">Hapus</button>
                        </td>
                    </tr>
                    @endif
                    @else
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->alternatif->guru['nama_guru'] }}</td>
                        <td>{{ $item->kriteria['nama_kriteria'] }}</td>
                        <td class="text-center">{{ $item->subKriteria['sub_kriteria'] }}</td>
                        <td class="text-center">
                            <a href="{{ route('edit_penilaian', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="deletePenilaian({{ $item->id }})">Hapus</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function deletePenilaian(penilaianId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data penilaian akan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Make an AJAX request to delete the record
                deletePenilaianAjax(penilaianId);
            }
        });
    }

    function deletePenilaianAjax(penilaianId) {
        $.ajax({
            url: '{{ route("delete_penilaian", ":id") }}'.replace(':id', penilaianId),
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {
                // Reload the page or update the table as needed
                location.reload();
            },
            error: function(error) {
                console.error('Error:', error);
                // Handle error if needed
            }
        });
    }
</script>

<!-- Page level plugins -->
<script src="{{ url('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush