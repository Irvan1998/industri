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
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Perusahaan mampu menjamin bahan berasal dari
pemasok yang memiliki sertifikasi halal yang
valid',
            'tahap' => '1',
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Perhatian yang serius terhadap fasilitas produksi
yang digunakan guna mengatasi masalah
kontaminasi produk halal dan non halal
            ',
            'tahap' => '1',
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Transportasi khusus untuk produk makanan halal',
            'tahap' => '1',
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Infrastruktur/peralatan pembantu khusus untuk produk makanan halal',
            'tahap' => '1',
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Pemisahan minimum yang diperlukan dalam penyimpanan halal untuk rantai makanan',
            'tahap' => '1',
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Perusahaan menjamin karyawan mendapatkan pelatihan eksternal tipe sederhana
minimal dua tahun sekali (training singkat sebelum audit, training singkat LPPOM
MUI, training dari lembaga lain) dalam menangani produk halal yang memadai',
            'tahap' => '2',
            'kategori' => 'SDM'
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Perusahaan menjamin karyawan mendapatkan pelatihan internal dalam menangani
produk halal yang memadai',
            'tahap' => '2',
            'kategori' => 'SDM'
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Level pemahaman karyawan dalam prosedur penanganan makanan halal',
            'tahap' => '2',
            'kategori' => 'SDM'
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Level pemahaman karyawan dalam persyaratan Islam dalam makanan halal',
            'tahap' => '2',
            'kategori' => 'SDM'
            // 'kategori' => 'Sumber Daya Manusia',
        ]);
        Indikator::Create([
            'nama' => 'Peralatan dan mesin pemrosesan yang disediakan bersifat higienis dan disetujui oleh
LPPOM MUI',
            'tahap' => '2',
            'kategori' => 'PRODUKSI'
            // 'kategori' => 'Produksi',
        ]);
        Indikator::Create([
            'nama' => "Sanitasi dan kebersihan area produksi dijaga sesuai dengan persyaratan Syari'ah yang
disetujui oleh LPPOM MUI",
            'tahap' => '2',
            'kategori' => 'PRODUKSI'
            // 'kategori' => 'Produksi',
        ]);
        Indikator::Create([
            'nama' => 'Prosedur standar dalam food operation memenuhi konsep halal',
            'tahap' => '2',
            'kategori' => 'PRODUKSI'
            // 'kategori' => 'Produksi',
        ]);
        Indikator::Create([
            'nama' => "Fasilitas penyimpanan bersih dan higienis yang memenuhi persyaratan hukum
Syari'ah LPPOM MUI",
            'tahap' => '2',
            'kategori' => 'PENYIMPANAN&TRANSPORTASI'
            // 'kategori' => 'Penyimpanan dan Transportasi',
        ]);
        Indikator::Create([
            'nama' => "Transportasi bersih dan higienis yang memenuhi persyaratan LPPOM MUI hukum
Syari`ah",
            'tahap' => '2',
            'kategori' => 'PENYIMPANAN&TRANSPORTASI'
            // 'kategori' => 'Penyimpanan dan Transportasi',
        ]);
        Indikator::Create([
            'nama' => "Menerapkan persyaratan halal di setiap aspek dalam produksi melalui penetapan
komitmen halal/kebijakan halal",
            'tahap' => '2',
            'kategori' => 'INTEGRITASHALAL'
            // 'kategori' => 'Integritas Halal',
        ]);
        Indikator::Create([
            'nama' => "Perusahaan menjamin telah membentuk tim manajemen halal yang berkompeten",
            'tahap' => '2',
            'kategori' => 'INTEGRITASHALAL'
            // 'kategori' => 'Integritas Halal',
        ]);
        Indikator::Create([
            'nama' => "Perusahaan menjamin telah dilakukan audit internal yang memadai untuk memastikan
produksi memenuhi persyaratan halal",
            'tahap' => '2',
            'kategori' => 'INTEGRITASHALAL'
            // 'kategori' => 'Integritas Halal',
        ]);
        Indikator::Create([
            'nama' => "Perusahaan menjamin telah dilakukan kaji ulang manajemen yang memadai untuk
menilai efektifitas penerapan SJH dan merumuskan perbaikan berkelanjutan",
            'tahap' => '2',
            'kategori' => 'INTEGRITASHALAL'
            // 'kategori' => 'Integritas Halal',
        ]);
        Indikator::Create([
            'nama' => "Perusahaan menjamin terdapat fasilitas sistematis untuk mengajukan pengaduan
(seperti, ditemukan produk yang tidak memenuhi kriteria) yang memadai",
            'tahap' => '2',
            'kategori' => 'INTEGRITASHALAL'
            // 'kategori' => 'Integritas Halal',
        ]);
    }
}
