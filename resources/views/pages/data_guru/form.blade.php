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


<div class="card shadow mb-4">
    @if (!empty($guru))
    <form action="{{ url('data-guru/update').$guru->id }}" method="POST">
        @else
        <form action="{{ url('data-guru/store') }}" method="POST">
            @endif
            @csrf
            <input type="hidden" class="form-control" name="id" @if(!empty($guru)) value="{{ $guru->id }}" @endif>
            <div class="card-body p-0">
                <div class="card border-top-primary mb-2">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample" >
                        <div class="card-body">
                            <div class="form-group">
                                <strong for="">Nama Guru</strong>
                                <input type="text" class="form-control" name="nama_guru" @if(!empty($guru)) value="{{ $guru->nama_guru }}" @else value="{{ Session::get('nama_guru') }}" @endif>
                            </div>
                            <div class="form-group">
                                <strong class="bold" for="">Jenis Kelamin</strong>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="lk" value="Laki-laki" @if(!empty($guru) && $guru->gender == 'Laki-laki') checked @else {{old('gender') == 'Laki-laki' ? 'checked' : ''}} @endif>
                                            <label class="form-check-label" for="lk">
                                                Laki-laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="pr" value="Perempuan" @if(!empty($guru) && $guru->gender == 'Perempuan') checked @else {{old('gender') == 'Perempuan' ? 'checked' : ''}} @endif>
                                            <label class="form-check-label" for="pr">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong for="">NIPA</strong>
                                <input type="text" class="form-control" name="nipa" @if(!empty($guru)) value="{{ $guru->nipa }}" @else value="{{ Session::get('nipa') }}" @endif>
                            </div>
                            <div class="form-group">
                                <strong for="">Tempat, Tanggal Lahir</strong>
                                <div class="row">
                                    <!-- Tempat Lahir -->
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" @if(!empty($guru)) value="{{ $guru->tempat_lahir }}" @else value="{{ Session::get('tempat_lahir') }}" @endif>
                                    </div>
                
                                    <!-- Tanggal Lahir -->
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" name="tanggal_lahir" @if(!empty($guru)) value="{{ $guru->tanggal_lahir }}" @else value="{{ Session::get('tanggal_lahir') }}" @endif>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <strong for="">Kabupaten</strong>
                                        <input type="text" class="form-control" name="kabupaten" @if(!empty($guru)) value="{{ $guru->kabupaten }}" @else value="{{ Session::get('kabupaten') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <strong for="">Kecamatan</strong>
                                        <input type="text" class="form-control" name="kecamatan" @if(!empty($guru)) value="{{ $guru->kecamatan }}" @else value="{{ Session::get('kecamatan') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <strong for="">Kelurahan</strong>
                                        <input type="text" class="form-control" name="kelurahan" @if(!empty($guru)) value="{{ $guru->kelurahan }}" @else value="{{ Session::get('kelurahan') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <strong for="">Kode Pos</strong>
                                        <input type="text" class="form-control" name="kodepos" @if(!empty($guru)) value="{{ $guru->kodepos }}" @else value="{{ Session::get('kodepos') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <strong for="">Detail Alamat</strong>
                                        <textarea class="form-control" name="jalan" rows="5">@if(!empty($guru)){{ $guru->jalan }} @else {{ Session::get('jalan') }} @endif </textarea>
                                    </div>
                                </div>
                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <strong for="">Rt</strong>
                                        <input type="text" class="form-control" name="rt" @if(!empty($guru)) value="{{ $guru->rt }}" @else value="{{ Session::get('rt') }}" @endif>
                                    </div>
                                </div>
                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <strong for="">Rw</strong>
                                        <input type="text" class="form-control" name="rw" @if(!empty($guru)) value="{{ $guru->rw }}" @else value="{{ Session::get('rw') }}" @endif>
                                    </div>
                                </div>
                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <strong for="">Dusun</strong>
                                        <input type="text" class="form-control" name="dusun" @if(!empty($guru)) value="{{ $guru->dusun }}" @else value="{{ Session::get('dusun') }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <strong for="">No Hp</strong>
                                        <input type="text" class="form-control" name="nohp" @if(!empty($guru)) value="{{ $guru->nohp }}" @else value="{{ Session::get('nohp') }}" @endif>
                                    </div>
                                </div>
                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <strong for="">No Hp2 (Opsional)</strong>
                                        <input type="text" class="form-control" name="nohp2" @if(!empty($guru)) value="{{ $guru->nohp2 }}" @else value="{{ Session::get('nohp2') }}" @endif>
                                    </div>
                                </div>
                
                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-top-primary">
                    <!-- Card Header - Accordion -->
                    <a href="#dataPendidikan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="dataPendidikan">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Akademik</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="dataPendidikan" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">NUPTK</label>
                                <input type="text" class="form-control" name="nuptk" @if(!empty($guru)) value="{{ $guru->nuptk }}" @else value="{{ Session::get('nuptk') }}" @endif>
                            </div><div class="form-group">
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
@endsection