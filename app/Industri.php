<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    protected $table = 'industri';
    public $timestamps = true;
    protected $fillable = array('nama', 'keterangan');
}
