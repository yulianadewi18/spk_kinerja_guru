@extends('layout.master')

@section('title', 'Update Klasifikasi')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <form action="{{ route('update_penilaian', ['kode_alternatif' => $penilaian[0]->id_alternatif, 'periode' => $penilaian[0]->periode]) }}" method="POST" id="penilaianForm">
        @csrf
        <div class="card-body pt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <select class="form-control" id="periode" name="periode">
                            @php
                            $tahunAkhir = date('Y');
                            $tahunAwal = $tahunAkhir - 10;
                            $periodeFirst = $penilaian->first()->periode;
                            @endphp
                            @for ($tahun = $tahunAkhir; $tahun >= $tahunAwal; $tahun--)
                            @php
                            $periode = $tahun . '-' . ($tahun + 1);
                            @endphp
                            <option value="{{ $periode }}" {{ $periode == $periodeFirst ? 'selected' : '' }}>{{ $periode }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Alternatif</label>
                        <select name="id_alternatif" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($alternatif as $alt)
                            <option value="{{ $alt->id }}" {{ $alt->id == $penilaian->first()->id_alternatif ? 'selected' : '' }}>{{ $alt->guru['nama_guru'] }}</option>
                            @endforeach
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
                        @foreach ($kriteria as $key => $item)
                        <tr>
                            <td scope="row">
                                <input type="hidden" value="{{ $item->id }}" name="id_kriteria[]">
                                {{ $loop->iteration }}. {{ $item->nama_kriteria }}
                            </td>
                            <td>
                                <select name="id_sub[]" class="form-control mb-2">
                                    <option value="">Pilih</option>
                                    @foreach ($subKriteria as $sub)
                                    <option value="{{ $sub->id }}" {{ $sub->id == $penilaian[$key]->id_sub ? 'selected' : '' }}>{{ $sub->id }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-lg-4">
                    <label for="" class="mt-3"><b>Keterangan Nilai</b></label>
                    <p class="mb-0">*Bobot pada setiap Sub Kriteria</p>
                    @foreach ($subKriteria as $subs)
                    <label for="" class="ml-4 mb-0">{{ $subs->bobot }} = {{ $subs->sub_kriteria }}</label><br>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between!important;">
            <button type="button" class="btn btn-sm btn-warning" onclick="goBack()">Kembali</button>
            <button type="button" class="btn btn-sm btn-primary" onclick="validateAndSubmit()">Simpan</button>
        </div>
        </form>
</div>

<script>
    function goBack() {
        window.history.back();
    }

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
        var periode = document.getElementsByName('periode')[0].value;
        var idAlternatif = document.getElementsByName('id_alternatif')[0].value;
        var idSubValues = document.getElementsByName('id_sub[]');

        // Check if periode and idAlternatif are not empty
        if (periode.trim() === '' || idAlternatif.trim() === '') {
            return false;
        }

        // Check if at least one id_sub is selected for each kriteria
        for (var i = 0; i < idSubValues.length; i++) {
            if (idSubValues[i].value.trim() === '') {
                return false;
            }
        }

        return true;
    }
</script>

@endsection