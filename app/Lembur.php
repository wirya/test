<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembur extends Model
{
   // protected $table = 'karyawans';
    public function karyawans()
    {
		return $this->belongsTo('App\Karyawan');    
		
    }
}
