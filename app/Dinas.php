<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    protected $table = 'dinas';
    public $timestamps = true;
    protected $fillable = array('password', 'name', 'email');
}
