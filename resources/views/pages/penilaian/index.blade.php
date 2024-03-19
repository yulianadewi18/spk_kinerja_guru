@extends('layout.master')

@section('title', 'Data Nilai Alternatif')

@push('css')
<link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="mb-2">
    <form action="{{ route('penilaian_alternatif') }}" method="GET">
        <div class="form-group">
            <label for="periodeFilter">Pilih Periode:</label>
            <select name="periode" id="periodeFilter" class="form-control" onchange="this.form.submit()">
                <option value="">Pilih Periode</option>
                @foreach ($periode as $p)
                    <option value="{{ $p }}">{{ $p }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">
        <div class="mb-2">
            <a href="{{ route('create_penilaian') }}" class="btn btn-sm btn-primary">Tambah Nilai Alternatif</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center">Alternatif</th>
                        <th class="text-center" width="50%">Kriteria</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penilaian as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->alternatif->kode_alternatif }}</td>
                        <td>{{ $item->periode }}</td>
                        <td class="text-center">
                            <a href="{{ route('edit_penilaian', ['kode_alternatif' => $item->alternatif->kode_alternatif, 'periode' => $item->periode]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="deletePenilaian('{{ $item->alternatif->kode_alternatif }}', '{{ $item->periode }}')">Hapus</button>
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
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function deletePenilaian(kodeAlternatif, periode) {
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
                deletePenilaianAjax(kodeAlternatif, periode);
            }
        });
    }

    function deletePenilaianAjax(kodeAlternatif, periode) {
        $.ajax({
            url: '{{ route("delete_penilaian", ["kode_alternatif" => ":kode_alternatif", "periode" => ":periode"]) }}'.replace(':kode_alternatif', kodeAlternatif).replace(':periode', periode),
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

@endpush
