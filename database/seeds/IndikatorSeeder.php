<?php

use App\Indikator;
use Illuminate\Database\Seeder;

class IndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indikator::Create([
            'nama' => 'Perusahaan mampu menjamin bahan baku halal,bersih dan berkualitas sesuai dengan konsep halal',
            'tahap' => '1',
            'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Perusahaan mampu menjamin bahan berasal dari
pemasok yang memiliki sertifikasi halal yang
valid',
            'tahap' => '1',
            'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Perhatian yang serius terhadap fasilitas produksi
yang digunakan guna mengatasi masalah
kontaminasi produk halal dan non halal
            ',
            'tahap' => '1',
            'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Transportasi khusus untuk produk makanan halal',
            'tahap' => '1',
            'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Infrastruktur/peralatan pembantu khusus untuk produk makanan halal',
            'tahap' => '1',
            'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Pemisahan minimum yang diperlukan dalam penyimpanan halal untuk rantai makanan',
            'tahap' => '1',
            'kategori' => 'Sumber Daya Manusia',
        ]);
    }
}
