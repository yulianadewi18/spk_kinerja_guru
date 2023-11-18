<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'mst_kriteria';
    
    protected $fillable = [
        'kode_kriteria', 'nama_kriteria', 'bobot_kriteria',
    ];
}  
