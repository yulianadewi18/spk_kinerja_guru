<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class gurumodel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nipa', 'email', 'kabupaten','nohp2',
    ];

    public function updateBalita($id, $data)
    {
        return $this->where('nipa', $id)->update($data);
    }

    public function deleteGuru($id)
    {
        return $this->where('nama', $id)->delete();
    }


}
