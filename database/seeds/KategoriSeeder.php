<?php

use App\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::Create([
            'nama' => 'SDM',
        ]);
        Kategori::Create([
            'nama' => 'PRODUKSI',
        ]);
        Kategori::Create([
            'nama' => 'PENYIMPANAN&TRANSPORTASI',
        ]);
        Kategori::Create([
            'nama' => 'INTEGRITASHALAL',
        ]);
    }
}
