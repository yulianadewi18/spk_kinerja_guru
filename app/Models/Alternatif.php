<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'mst_alternatif';
    
    protected $fillable = [
        'kode_alternatif', 'id_guru',
    ];

    function penilaian() {
        return $this->hasMany(Penilaian::class, 'id_alternatif');
    }
    
    public function guru(){
        return $this->hasOne(Guru::class, 'id', 'id_guru');
    }

    function kriteria() {
        return $this->hasMany(Penilaian::class, 'id_alternatif', 'id');
    }
}
