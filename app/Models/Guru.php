<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurumodels';
    protected $primaryKey = 'nama'; 
    public $timestamps = false;

    protected $fillable = ['guru', 'nip'];

    public function getGuruByRoleId($role_id)
    {
        return $this->where('id_role', $role_id)->get();
    }

    public function getAllGuru()
    {
        return $this->all();
    }

    public function insertGuru($data)
    {
        return $this->create($data);
    }

    public function updateGuru($id, $data)
    {
        return $this->where('nama', $id)->update($data);
    }

    public function deleteGuru($id)
    {
        return $this->where('nama', $id)->delete();
    }

    public function getGurusSelect($role_id)
    {
        return $this->where('id_role', $role_id)->get();
    }

    public function getLastGuruID()
    {
        return $this->select('nama')->orderBy('nama', 'DESC')->first();
    }
}
