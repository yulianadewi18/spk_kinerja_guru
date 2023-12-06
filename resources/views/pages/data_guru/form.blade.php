@extends('layout.master')

@if (!empty($guru))
@section('title', 'Edit Guru')
@else
@section('title', 'Tambah Guru')
@endif

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all(); as $item)
        <li>{{ $item}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card border-top-primary shadow mb-4">
    @if (!empty($guru))
    <form action="{{ url('data-guru/update').$guru->id }}" method="POST">
        @else
        <div class="container">
            <form action="{{ url('data-guru/store') }}" method="POST">
                @endif
                @csrf
                <input type="hidden" class="form-control" name="id" @if(!empty($guru)) value="{{ $guru->id }}" @endif>
                <div class="card-body p-3">

                    <div class="form-group">
                        <label for="">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" @if(!empty($guru)) value="{{ $guru->nama_guru }}" @else value="{{ Session::get('nama_guru') }}" @endif>
                    </div>


                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="lk" value="Laki-laki" @if(!empty($guru) && $guru->gender == 'Laki-laki') checked @elseif(empty($guru) && Session::get('gender') == 'Laki-laki') checked @endif>
                            <label class="form-check-label" for="lk">
                                Laki-laki
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="pr" value="Perempuan" @if(!empty($guru) && $guru->gender == 'Perempuan') checked @elseif(empty($guru) && Session::get('gender') == 'Perempuan') checked @endif>
                            <label class="form-check-label" for="pr">
                                Perempuan
                            </label>
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="">NIPA</label>
                        <input type="text" class="form-control" name="nipa" @if(!empty($guru)) value="{{ $guru->nipa }}" @else value="{{ Session::get('nipa') }}" @endif>
                    </div>



                    <div class="form-group">
                        <label for="">Tempat, Tanggal Lahir</label>
                        <div class="row">
                            <!-- Tempat Lahir -->
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="ttl" placeholder="Tempat Lahir" @if(!empty($guru)) value="{{ $guru->ttl }}" @else value="{{ Session::get('ttl') }}" @endif>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-lg-6">
                                <input type="date" class="form-control" name="ttl" @if(!empty($guru)) value="{{ $guru->ttl }}" @else value="{{ Session::get('ttl') }}" @endif>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="">NUPTK</label>
                        <input type="text" class="form-control" name="nuptk" @if(!empty($guru)) value="{{ $guru->nuptk }}" @else value="{{ Session::get('nuptk') }}" @endif>
                    </div>



                    <div class="form-group">
                        <label for="">NRG</label>
                        <input type="text" class="form-control" name="nrg" @if(!empty($guru)) value="{{ $guru->nrg }}" @else value="{{ Session::get('nrg') }}" @endif>
                    </div>




                    <div class="form-group">
                        <label for="">Jenis Guru</label>
                        <input type="text" class="form-control" name="jns_guru" @if(!empty($guru)) value="{{ $guru->jns_guru }}" @else value="{{ Session::get('jns_guru') }}" @endif>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tugas</label>
                                <input type="text" class="form-control" name="tugas" @if(!empty($guru)) value="{{ $guru->tugas }}" @else value="{{ Session::get('tugas') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tugas Tambahan</label>
                                <input type="text" class="form-control" name="tambahan" @if(!empty($guru)) value="{{ $guru->tambahan }}" @else value="{{ Session::get('tambahan') }}" @endif>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Ijazah</label>
                                <input type="text" class="form-control" name="ijazah" @if(!empty($guru)) value="{{ $guru->ijazah }}" @else value="{{ Session::get('ijazah') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tahun Lulus</label>
                                <input type="number" class="form-control" name="tahun_lulus" min="1900" max="2100" @if(!empty($guru)) value="{{ $guru->tahun_lulus }}" @else value="{{ Session::get('tahun_lulus') }}" @endif>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Perguruan Tinggi/Sekolah</label>
                                <input type="text" class="form-control" name="pt" @if(!empty($guru)) value="{{ $guru->pt }}" @else value="{{ Session::get('pt') }}" @endif>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Fakultas</label>
                                <input type="text" class="form-control" name="fakultas" @if(!empty($guru)) value="{{ $guru->fakultas }}" @else value="{{ Session::get('fakultas') }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" @if(!empty($guru)) value="{{ $guru->jurusan }}" @else value="{{ Session::get('jurusan') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Prodi</label>
                                <input type="text" class="form-control" name="prodi" @if(!empty($guru)) value="{{ $guru->prodi }}" @else value="{{ Session::get('prodi') }}" @endif>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Akta Mengajar</label>
                        <input type="text" class="form-control" name="akta_mengajar" @if(!empty($guru)) value="{{ $guru->akta_mengajar }}" @else value="{{ Session::get('akta_mengajar') }}" @endif>
                    </div>




                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Jalan</label>
                                <input type="text" class="form-control" name="jalan" @if(!empty($guru)) value="{{ $guru->jalan }}" @else value="{{ Session::get('jalan') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Rt</label>
                                <input type="text" class="form-control" name="rt" @if(!empty($guru)) value="{{ $guru->rt }}" @else value="{{ Session::get('rt') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Rw</label>
                                <input type="text" class="form-control" name="rw" @if(!empty($guru)) value="{{ $guru->rw }}" @else value="{{ Session::get('rw') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Dusun</label>
                                <input type="text" class="form-control" name="dusun" @if(!empty($guru)) value="{{ $guru->dusun }}" @else value="{{ Session::get('dusun') }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" @if(!empty($guru)) value="{{ $guru->kelurahan }}" @else value="{{ Session::get('kelurahan') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" @if(!empty($guru)) value="{{ $guru->kecamatan }}" @else value="{{ Session::get('kecamatan') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Kabupaten</label>
                                <input type="text" class="form-control" name="kabupaten" @if(!empty($guru)) value="{{ $guru->kabupaten }}" @else value="{{ Session::get('kabupaten') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Kode Pos</label>
                                <input type="text" class="form-control" name="kodepos" @if(!empty($guru)) value="{{ $guru->kodepos }}" @else value="{{ Session::get('kodepos') }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input type="text" class="form-control" name="nohp" @if(!empty($guru)) value="{{ $guru->nohp }}" @else value="{{ Session::get('nohp') }}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">No Hp2</label>
                                <input type="text" class="form-control" name="nohp2" @if(!empty($guru)) value="{{ $guru->nohp2 }}" @else value="{{ Session::get('nohp2') }}" @endif>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-footer justify-content-between" style="display: flex">
                    <a href="{{ route('data_kriteria') }}" class="btn btn-sm btn-warning">Kembali</a>
                    @if (!empty($guru))
                    <button class="btn btn-sm btn-primary">Update</button>
                    @else
                    <button class="btn btn-sm btn-primary">Tambah</button>
                    @endif
                </div>
            </form>
        </div>
</div>
@endsection