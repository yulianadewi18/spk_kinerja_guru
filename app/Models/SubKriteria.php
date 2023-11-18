<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'mst_sub_kriteria';
    
    protected $fillable = [
        'sub_kriteria', 'bobot',
    ];
}
