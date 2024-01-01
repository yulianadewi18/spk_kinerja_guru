@extends('layout.master')

@section('title', 'Detail Guru')

@section('content')
<div class="card border-top-primary shadow  mb-4">
    <div class="card-body pt-3">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('profile.jpg') }}" style="width: 100%">
            </div>
            <div class="col-md-10">
                <h2><b>Data Pribadi</b></h2>
                <table class="table">
                    <tr>
                        <td width="30%"><b>NIPA</b></td>
                        <td>: {{ $guru->nipa }}</td>
                    </tr>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>: {{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: {{ $guru->tempat_lahir }}, {{ date('d-m-Y', strtotime($guru->tanggal_lahir) ) }}</td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>: {{ $guru->gender }}</td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td>: {{ $guru->jalan }} Rt.{{ $guru->rt }} Rw.{{ $guru->rw }}, Kel. {{ $guru->kecamatan }}, Kab. {{ $guru->kabupaten }}
                            <br>&nbsp; Kode Pos: {{ $guru->kodepos }}</td>
                    </tr>
                    <tr>
                        <td><b>No HP 1</b></td>
                        <td>: {{ $guru->nohp }}</td>
                    </tr>
                    <tr>
                        <td><b>No HP 2</b></td>
                        <td>: {{ $guru->nohp2 }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12">
                <hr>
                <h2><b>Informasi Akademik</b></h2>
                <table class="table">
                    <tr>
                        <td width="30%"><b>NUPTK</b></td>
                        <td>: {{ $guru->nuptk }}</td>
                    </tr>
                    <tr>
                        <td><b>NRG</b></td>
                        <td>: {{ $guru->nrg }}</td>
                    </tr>
                    <tr>
                        <td><b>Jenis Guru</b></td>
                        <td>: {{ $guru->jns_guru }}</td>
                    </tr>
                    <tr>
                        <td><b>Tugas</b></td>
                        <td>: {{ $guru->tugas }}</td>
                    </tr>
                    <tr>
                        <td><b>Tugas Tambahan</b></td>
                        <td>: {{ $guru->tambahan }}</td>
                    </tr>
                    <tr>
                        <td><b>Ijazah</b></td>
                        <td>: {{ $guru->ijazah }}</td>
                    </tr>
                    <tr>
                        <td><b>Tahun Lulus</b></td>
                        <td>: {{ $guru->tahun_lulus }}</td>
                    </tr>
                    <tr>
                        <td><b>Perguruan Tinggi/Sekolah</b></td>
                        <td>: {{ $guru->pt }}</td>
                    </tr>
                    <tr>
                        <td><b>Fakultas</b></td>
                        <td>: {{ $guru->fakultas }}</td>
                    </tr>
                    <tr>
                        <td><b>Jurusan</b></td>
                        <td>: {{ $guru->jurusan }}</td>
                    </tr>
                    <tr>
                        <td><b>Prodi</b></td>
                        <td>: {{ $guru->prodi }}</td>
                    </tr>
                    <tr>
                        <td><b>Akta Mengajar</b></td>
                        <td>: {{ $guru->akta_mengajar }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card-footer justify-content-between" style="display: flex">
        <a href="{{ route('data_guru') }}" class="btn btn-sm btn-warning">Kembali</a>
    </div>
</div>
@endsection