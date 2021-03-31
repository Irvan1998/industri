<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahp extends Model
{
    protected $table = 'ahp';
    public $timestamps = true;
    protected $fillable = array('id_user', 'id_matriks', 'kategori', 'nilai');
}
