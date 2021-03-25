<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{


    protected $table = 'skala';
    public $timestamps = true;
    protected $fillable = array('id_industri', 'id_indikator', 'nama');
}
