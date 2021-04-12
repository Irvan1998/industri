<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public $timestamps = true;
    protected $fillable = array('nama');
}
