<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public function karyawan()
    {
        return $this->onetoMany('App\Karyawan');    
    }

    public function lembur()
    {
        return $this->onetoMany('App\Lembur');    
    }
}
