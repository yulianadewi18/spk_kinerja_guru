@extends('layout.master')

@section('title', 'Edit Penilaian Alternatif')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <form action="{{ route('update_penilaian', ['id' => $penilaian->id]) }}" method="POST" id="penilaianForm">
        @csrf
        @if(isset($edit))
        @method('PUT') {{-- Use 'PUT' for updating --}}
        @endif

        <div class="card-body pt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="text" class="form-control" name="periode" value="{{ isset($penilaian) ? $penilaian->periode : '' }}" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_alternatif">Alternatif</label>
                        <select name="id_alternatif" class="form-control" readonly>
                            <option value="{{ isset($penilaian) ? $penilaian->id_alternatif : '' }}" selected>{{ isset($penilaian) ? $penilaian->alternatif->guru->nama_guru : 'Pilih' }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-8">
                    <label for=""><b>Penilaian Kriteria</b></label>
                    <hr style="border: 1px solid; margin-top:0px">
                    <table width="100%">
                        <tr>
                            <td><b>Kriteria</b></td>
                            <td width="30%"><b>Sub Kriteria</b></td>
                        </tr>
                        @foreach ($kriteria as $item)
                        <tr>
                            <td scope="row">
                                <input type="hidden" value="{{ $item->id }}" name="id_kriteria[]">
                                {{ $loop->iteration }}. {{ $item->nama_kriteria }}
                            </td>
                            <td>
                                <select name="id_sub[]" class="form-control mb-2">
                                    <option value="">Pilih</option>
                                    @foreach ($subKriteria as $sub)
                                    <option value="{{ $sub->id }}" {{ isset($penilaian) && $sub->id == $penilaian->id_sub ? 'selected' : '' }}>{{ $sub->sub_kriteria }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer" style="display: flex; justify-content: space-between!important;">
            <a href="{{ route('penilaian_alternatif') }}" class="btn btn-sm btn-warning">Kembali</a>
            <button type="button" class="btn btn-sm btn-primary" onclick="validateAndSubmit()">Simpan</button>
        </div>
    </form>
</div>

<script>
    function validateAndSubmit() {
        var isValid = validateForm();

        if (isValid) {
            document.getElementById('penilaianForm').submit();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ada data yang masih kosong! Silakan isi semua field.',
            });
        }
    }

    function validateForm() {
        // Add any additional validation logic as needed

        var periode = document.getElementsByName('periode')[0].value;
        var idAlternatif = document.getElementsByName('id_alternatif')[0].value;

        return periode.trim() !== '' && idAlternatif.trim() !== '';
    }
</script>

@endsection