<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables, Carbon\Carbon;

class DataGuruController extends Controller
{
    function index(Request $request)
    {
        $data_guru = Guru::get();
        if ($request->ajax()) {
            $fetchAll = DataTables::of($data_guru)
                ->addIndexColumn()
                ->addColumn('ttl', function ($data) {
                    return $data->tempat_lahir. ', ' . date('d-m-Y', strtotime($data->tanggal_lahir) );                    
                })
                ->addColumn('action', function ($data) {
                    return '
                    <div class="btn-group">
                        <a href="'. route('detail_guru', $data->id) .'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="' . route('edit_guru', $data->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(`' . route('destroy_guru', $data->id) . '`)"><i class="fas fa-trash"></i></button>
                    </div> 
                ';
                })
                ->rawColumns(['ttl', 'action'])
                ->make(true);
            return $fetchAll;
        }
        return view('pages.data_guru.index', compact('data_guru'));
    }

    function create()
    {
        return view('pages.data_guru.form');
    }

    function store(Request $request)
    {
        $request->session()->flash('nama_guru', $request->nama_guru);
        $request->session()->flash('gender', $request->gender);
        $request->session()->flash('nipa', $request->nipa);
        $request->session()->flash('tempat_lahir', $request->tempat_lahir);
        $request->session()->flash('tanggal_lahir', $request->tanggal_lahir);
        $request->session()->flash('nuptk', $request->nuptk);
        $request->session()->flash('nrg', $request->nrg);
        $request->session()->flash('jns_guru', $request->jns_guru);
        $request->session()->flash('tugas', $request->tugas);
        $request->session()->flash('tambahan', $request->tambahan);
        $request->session()->flash('ijazah', $request->ijazah);
        $request->session()->flash('tahun_lulus', $request->tahun_lulus);
        $request->session()->flash('pt', $request->pt);
        $request->session()->flash('fakultas', $request->fakultas);
        $request->session()->flash('jurusan', $request->jurusan);
        $request->session()->flash('prodi', $request->prodi);
        $request->session()->flash('akta_mengajar', $request->akta_mengajar);
        $request->session()->flash('jalan', $request->jalan);
        $request->session()->flash('rt', $request->rt);
        $request->session()->flash('rw', $request->rw);
        $request->session()->flash('dusun', $request->dusun);
        $request->session()->flash('kelurahan', $request->kelurahan);
        $request->session()->flash('kecamatan', $request->kecamatan);
        $request->session()->flash('kabupaten', $request->kabupaten);
        $request->session()->flash('kodepos', $request->kodepos);
        $request->session()->flash('nohp', $request->nohp);
        $request->session()->flash('nohp2', $request->nohp2);

        $data = $request->validate([
            'nama_guru'  => 'required',
            'gender'  => 'required',
            'nipa'  => 'required |unique:mst_guru',
            'tempat_lahir'  => 'required',
            'tanggal_lahir'  => 'required',
            'nuptk'  => 'required',
            'nrg'  => 'required',
            'jns_guru'  => 'required',
            'tugas'  => 'required',
            'tambahan'  => 'required',
            'ijazah'  => 'required',
            'tahun_lulus'  => 'required',
            'pt'  => 'required',
            'fakultas'  => 'required',
            'jurusan'  => 'required',
            'prodi'  => 'required',
            'akta_mengajar'  => 'required',
            'jalan'  => 'required',
            'rt'  => 'required',
            'rw'  => 'required',
            'dusun'  => 'required',
            'kelurahan'  => 'required',
            'kecamatan'  => 'required',
            'kabupaten'  => 'required',
            'kodepos'  => 'required',
            'nohp'  => 'required',
            'nohp2'  => 'required',
        ], [
            'nama_guru.required'  => 'Nama Guru wajib diisi',
            'gender.required'  => 'Jenis Kelamin wajib diisi',
            'nipa.required'  => 'NIPA wajib diisi',
            'nipa.unique'  => 'NIPA sudah digunakan',
            'tempat_lahir.required'  => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required'  => 'Tanggal Lahir wajib diisi',
            'nuptk.required'  => 'NUPTK wajib diisi',
            'nrg.required'  => 'NRG wajib diisi',
            'jns_guru.required'  => 'Jenis Guru wajib diisi',
            'tugas.required'  => 'Tugas wajib diisi',
            'tambahan.required'  => 'Tugas Tambahan wajib diisi',
            'ijazah.required'  => 'Ijazah wajib diisi',
            'tahun_lulus.required'  => 'Tahun Lulus wajib diisi',
            'pt.required'  => 'Perguruan Tinggi / Sekolah wajib diisi',
            'fakultas.required'  => 'Fakultas wajib diisi',
            'jurusan.required'  => 'Jurusan wajib diisi',
            'prodi.required'  => 'Prodi wajib diisi',
            'akta_mengajar.required'  => 'Akta Mengajar wajib diisi',
            'jalan.required'  => 'Jalan wajib diisi',
            'rt.required'  => 'Rt wajib diisi',
            'rw.required'  => 'Rw wajib diisi',
            'dusun.required'  => 'Dusun wajib diisi',
            'kelurahan.required'  => 'Kelurahan wajib diisi',
            'kecamatan.required'  => 'Kecamatan wajib diisi',
            'kabupaten.required'  => 'Kabupaten wajib diisi',
            'kodepos.required'  => 'Kode pos wajib diisi',
            'nohp.required'  => 'No Hp wajib diisi',
            'nohp2.required'  => 'No Hp2 wajib diisi',
        ]);

        Guru::create($data);
        return redirect('/data-guru')->with('success', 'Berhasil tambah Guru baru.');
    }

    function edit($id)
    {
        $guru = Guru::find($id);
        return view('pages.data_guru.form', compact('guru'));
    }

    function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_guru'  => 'required',
            'gender'  => 'required',
            'nipa'  => 'required|unique:mst_guru,id',
            'tempat_lahir'  => 'required',
            'tanggal_lahir'  => 'required',
            'nuptk'  => 'required',
            'nrg'  => 'required',
            'jns_guru'  => 'required',
            'tugas'  => 'required',
            'tambahan'  => 'required',
            'ijazah'  => 'required',
            'tahun_lulus'  => 'required',
            'pt'  => 'required',
            'fakultas'  => 'required',
            'jurusan'  => 'required',
            'prodi'  => 'required',
            'akta_mengajar'  => 'required',
            'jalan'  => 'required',
            'rt'  => 'required',
            'rw'  => 'required',
            'dusun'  => 'required',
            'kelurahan'  => 'required',
            'kecamatan'  => 'required',
            'kabupaten'  => 'required',
            'kodepos'  => 'required',
            'nohp'  => 'required',
            'nohp2'  => 'required',
        ], [
            'nama_guru.required'  => 'Nama Guru wajib diisi',
            'gender.required'  => 'Jenis Kelamin wajib diisi',
            'nipa.required'  => 'NIPA wajib diisi',
            'nipa.unique'  => 'NIPA sudah digunakan',
            'tempat_lahir.required'  => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required'  => 'Tanggal Lahir wajib diisi',
            'nuptk.required'  => 'NUPTK wajib diisi',
            'nrg.required'  => 'NRG wajib diisi',
            'jns_guru.required'  => 'Jenis Guru wajib diisi',
            'tugas.required'  => 'Tugas wajib diisi',
            'tambahan.required'  => 'Tugas Tambahan wajib diisi',
            'ijazah.required'  => 'Ijazah wajib diisi',
            'tahun_lulus.required'  => 'Tahun Lulus wajib diisi',
            'pt.required'  => 'Perguruan Tinggi / Sekolah wajib diisi',
            'fakultas.required'  => 'Fakultas wajib diisi',
            'jurusan.required'  => 'Jurusan wajib diisi',
            'prodi.required'  => 'Prodi wajib diisi',
            'akta_mengajar.required'  => 'Akta Mengajar wajib diisi',
            'jalan.required'  => 'Jalan wajib diisi',
            'rt.required'  => 'Rt wajib diisi',
            'rw.required'  => 'Rw wajib diisi',
            'dusun.required'  => 'Dusun wajib diisi',
            'kelurahan.required'  => 'Kelurahan wajib diisi',
            'kecamatan.required'  => 'Kecamatan wajib diisi',
            'kabupaten.required'  => 'Kabupaten wajib diisi',
            'kodepos.required'  => 'Kode pos wajib diisi',
            'nohp.required'  => 'No Hp wajib diisi',
            'nohp2.required'  => 'No Hp2 wajib diisi',
        ]);

        $guru = Guru::find($id);

        if ($guru === null) {
            return redirect('/data-guru')->with('error', 'Data Guru tidak ditemukan.');
        }

        $guru->update($data);

        return redirect('/data-guru')->with('success', 'Data berhasil diupdate.');
    }

    function detail($id)
    {
        $guru = Guru::find($id);
        return view('pages.data_guru.detail', compact('guru'));
    }

    function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        return response('Data berhasil dihapus.', 200);
    }
}
