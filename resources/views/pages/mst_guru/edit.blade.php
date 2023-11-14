@extends('layout.master')

@section('title', 'Edit')

@push('css')
    <style>
        .data-title{
            color: red;
        }
        .card-footer{
            display: flex;
        }
    </style>
@endpush
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <form action="">
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-lg-12"><b class="data-title">(*) Data Guru</b><br><small><i>Nb: Semua field wajib di isi. Isikan tanda " - " jika ada field yang ingin dikosongi</i></small></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="" id="" class="form-control">
                                <option value="">Laki-Laki</option>
                                <option value="">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">RT</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">RW</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="" id="" class="form-control">
                                <option value="">--Pilih Provinsi--</option>
                                <option value="">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Kabupaten</label>
                            <select name="" id="" class="form-control">
                                <option value="">--Pilih Kabupaten--</option>
                                <option value="">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select name="" id="" class="form-control">
                                <option value="">--Pilih Kecamatan--</option>
                                <option value="">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Kelurahan</label>
                            <select name="" id="" class="form-control">
                                <option value="">--Pilih Kelurahan--</option>
                                <option value="">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Dusun</label>
                            <select name="" id="" class="form-control">
                                <option value="">--Pilih Dusun--</option>
                                <option value="">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12"><b class="data-title">(*) Riwayat Pendidikan</b></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Pendidikan Terakhir</label>
                            <select name="" id="" class="form-control">
                                <option value="">SMA/K</option>
                                <option value="">D1</option>
                                <option value="">D2</option>
                                <option value="">D3</option>
                                <option value="">D4</option>
                                <option value="">S1</option>
                                <option value="">S2</option>
                                <option value="">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Sekolah/Universitas</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Tahun Lulus</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Fakultas</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Program Studi</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Akta Mengajar</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12"><b class="data-title">(*) Data Pengajar</b></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">NIPA</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">NUPTK</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">NRG</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Jenis Guru</label>
                            <select name="" id="" class="form-control">
                                <option value="">Bidang Studi (Al-Quran)</option>
                                <option value="">Bidang Studi (Bahasa Arab)</option>
                                <option value="">Guru Kelas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Tugas Mengajar</label>
                            <select name="" id="" class="form-control">
                                <option value="">Kelas 1</option>
                                <option value="">Kelas 2</option>
                                <option value="">Kelas 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Tugas Tambahan</label>
                            <select name="" id="" class="form-control">
                                <option value="-">Pilih Tugas Tambahan</option>
                                <option value="">Kepala Sekolah</option>
                                <option value="">Wali Kelas 1</option>
                                <option value="">Wali Kelas 2</option>
                                <option value="">Wali Kelas 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <tbody>
                                <?php foreach ($dataView as $item) : ?>
                                    <tr>
                                        <td><?php echo $item['nama'] . '(' . $item['detail'] . ')'; ?></td>

                                        <?php
                                        $no = 1;
                                        foreach ($item['data'] as $dataItem) :
                                            $isChecked = false;
                                            if (isset($nilai)) {
                                                foreach ($nilai as $value) {
                                        ?>
                                                    <script>
                                                        console.log(<?php echo json_encode($value); ?>);
                                                    </script>
                                            <?php
                                                    if ($value->kdKriteria == $dataItem->kdKriteria && $value->nilai == $dataItem->value) {
                                                        $isChecked = true;
                                                        break;
                                                    }
                                                }
                                            } elseif ($no == 3) {
                                                $isChecked = true;
                                            }
                                            ?>
                                            <td>
                                                <input type="radio" name="nilai[<?php echo $dataItem->kdKriteria ?>]" value="<?php echo $dataItem->value ?>" <?php echo $isChecked ? 'checked="checked"' : '' ?> /> <?php echo $dataItem->subKriteria; ?>
                                            </td>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
            <div class="card-footer justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">Kembali</a>
                <button class="btn btn-sm btn-primary">Tambah</button>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection