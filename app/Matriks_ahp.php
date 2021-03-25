<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriks_ahp extends Model
{
    protected $table = 'matriks_ahp';
    public $timestamps = true;
    protected $fillable = array('id_indikator', 'id_indikator2', 'kategori');
}
