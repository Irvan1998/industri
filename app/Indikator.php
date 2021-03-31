<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';
    public $timestamps = true;
    protected $fillable = array('kategori', 'tahap', 'nama');

    public function matriks_ahp()
    {
        return $this->hasMany(Matriks_ahp::class);
    }
}
