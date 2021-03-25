<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penguji extends Model
{
    protected $table = 'penguji';
    public $timestamps = true;
    protected $fillable = array('password', 'name', 'email');
}
