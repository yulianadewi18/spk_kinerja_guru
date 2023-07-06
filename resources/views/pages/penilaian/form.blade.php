@extends('layout.master')

@section('title', 'Tambah Klasifikasi')
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <form action="">
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Periode</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih</option>
                                <option value="">Periode 1</option>
                                <option value="">Periode 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Alternatif</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih</option>
                                <option value="">Alternatif 1</option>
                                <option value="">Alternatif 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <label for=""><b>Penilaian Kriteria</b></label>
                        <hr style="border: 1px solid; margin-top:0px">
                        <table width="100%">
                            <tr>
                                <td>Kriteria</td>
                                <td>Nilai</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Kriteria 1</label>
                                    </div>
                                </td>
                                <td>
                                    <select name="" id="" class="form-control mb-2">
                                        <option value="">Pilih</option>
                                        <option value="">Nilai 1</option>
                                        <option value="">Nilai 2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Kriteria 2</label>
                                    </div>
                                </td>
                                <td>
                                    <select name="" id="" class="form-control mb-2">
                                        <option value="">Pilih</option>
                                        <option value="">Nilai 1</option>
                                        <option value="">Nilai 2</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="mt-3"><b>Keterangan Nilai</b></label>
                        <p>*Untuk kriteria Daya Tahan, Umur, & Harga</p>
                        <label for="" class="ml-4 mb-0">1 = Sangat Baik</label><br>
                        <label for="" class="ml-4 mb-0">2 = Baik</label><br>
                        <label for="" class="ml-4 mb-0">3 = Biasa</label><br>
                        <label for="" class="ml-4 mb-0">4 = Buruk</label><br>
                        <label for="" class="ml-4 mb-0">5 = Sangat Buruk</label>
                        
                        <p class="mt-4">*Untuk layanan Purna Jual</p>
                        <label for="" class="ml-4 mb-0">1 = Sangat Baik</label><br>
                        <label for="" class="ml-4 mb-0">2 = Baik</label><br>
                        <label for="" class="ml-4 mb-0">3 = Biasa</label><br>
                        <label for="" class="ml-4 mb-0">4 = Buruk</label><br>
                        <label for="" class="ml-4 mb-0">5 = Sangat Buruk</label>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: space-between!important;">
                <button class="btn btn-sm btn-warning">Kembali</button>
                <button class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection