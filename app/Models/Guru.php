<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'mst_guru';
    
    protected $fillable = [
        'nama_guru', 'gender', 'nipa','tempat_lahir','tanggal_lahir',
         'nuptk', 'nrg','jns_guru', 'tugas',
          'tambahan','ijazah', 'tahun_lulus', 'pt',
          'fakultas', 'jurusan', 'prodi','akta_mengajar',
           'jalan', 'rt','rw', 'dusun', 
           'kelurahan','kecamatan', 'kabupaten', 'kodepos',
           'nohp', 'nohp2',
    ];
}
