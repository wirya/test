<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{


   public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');    
    }

    public function departemen()
    {
        return $this->belongsTo('App\Departemen');    
    }

    public function lembur()
    {
        return $this->hasMany('App\Lembur');   
        //return $this->hasMany('App\Post', 'karyawan_id');
        
    }
}
