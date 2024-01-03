<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian_alternatif';
    
    protected $fillable = [
        'periode', 'id_alternatif', 'id_kriteria', 'id_sub',
    ];
    
    public function guru(){
        return $this->hasOne(Alternatif::class, 'id', 'id_alternatif');
    }
    public function kriteria(){
        return $this->hasOne(Kriteria::class, 'id', 'id_kriteria');
    }
    public function subKriteria(){
        return $this->hasOne(SubKriteria::class, 'id', 'id_sub');
    }
}
