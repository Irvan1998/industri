<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai_skala';
    public $timestamps = true;
    protected $fillable = array('id_industri', 'id_indikator', 'id_skala', 'nilai');
}
