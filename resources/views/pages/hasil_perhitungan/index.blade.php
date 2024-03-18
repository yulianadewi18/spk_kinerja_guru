@extends('layout.master')

@section('title', 'Ranking')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-striped text-center" id="tabel" width="100%">
                <thead>
                    <tr>
                        <th class="text-left">Rank</th>
                        <th width="18%">Nama Guru</th>
                        <th width="8%">Jenis Kelamin</th>
                        <th width="10%">NIPA</th>
                        <th class="text-left">Nilai</th>
                        <th class="text-left">Status Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rank as $key => $value)
                    @php
                    $guru = App\Models\Guru::find($key);
                    @endphp
                    <tr>
                        <td class="text-left">{{ $loop->iteration }}</td>
                        <!-- <td class="text-left">{{ $key }}</td> -->
                        <td class="text-left">{{$guru->nama_guru}}</td>
                        <td class="text-left">{{$guru->gender}}</td>
                        <td class="text-left">{{$guru->nipa}}</td>
                        @foreach ($value as $key_1 => $value_1)
                        @if ($loop->last)
                        <td class="text-left">{{ number_format($value_1, 2) }}</td>
                        <td class="text-left">
                            @if($value_1 > 70)
                            Guru berprestasi
                            @else
                            Bimbingan
                            @endif
                        </td>
                        @endif
                        @endforeach
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
<link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/b-3.0.1/b-html5-3.0.1/b-print-3.0.1/datatables.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/b-3.0.1/b-html5-3.0.1/b-print-3.0.1/datatables.min.js"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#tabel').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-primary',
                titleAttr: 'Print Data',
                customize: function(win) {
                    $(win.document.body).css('font-size', '10pt');
                    $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    $(win.document.body).find('h1').css('text-align', 'center');

                    // Menambahkan kelas text-left ke setiap sel dalam tbody
                    $(win.document.body).find('tbody td').addClass('text-left');
                }
            }]
        });
    });
</script>




@endpush