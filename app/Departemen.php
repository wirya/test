<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    public function karyawan()
    {
        return $this->onetoMany('App\Karyawan');    
    }
}
