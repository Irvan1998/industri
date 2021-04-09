<?php

namespace App\Http\Controllers;

use App\Ahp;
use App\Indikator;
use App\Industri;
use App\Matriks_ahp;
use App\Penguji;
use App\Skala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;

class PengujiController extends Controller
{
    public function index()
    {
        $data = Penguji::get();
        $no = 1;
        return view('penguji.index', compact('data', 'no'));
    }

    public function create()
    {
        return view('penguji.create');
    }

    public function add(Request $r)
    {
        Penguji::create([
            'name' => $r->nama,
            'email' => $r->email,
            'password' => Hash::make('12345678')
        ]);

        return redirect(route('penguji'));
    }

    public function home()
    {
        /*
        Mencari Bobot Lokal & Global Kategori SDM
         */
        $ahps = Matriks_ahp::where('kategori', 'SDM')->get();
        $indikator =  Indikator::where('tahap', 2)->where('kategori', 'SDM')->get()->sortBy('id');
        $jml =  Indikator::where('tahap', 2)->where('kategori', 'SDM')->get()->sortBy('id')->count();
        $geomean = null;
        $total = null;
        $e_max = 0;
        // matriks penilaian
        foreach ($ahps as $a) {
            $ahp = Ahp::where('id_matriks', $a->id)->get();
            $ahp_n = Ahp::where('id_matriks', $a->id)->get()->count();
            $kali = 1;
            foreach ($ahp as $ahp) {
                $kali *= $ahp->nilai;
            }
            $geomean[$a->id_indikator][$a->id_indikator2] =  pow($kali, (float)(1 / $ahp_n));
            $geomean[$a->id_indikator2][$a->id_indikator] =  1 / (pow($kali, (float)(1 / $ahp_n)));
            $geomean[$a->id_indikator][$a->id_indikator] =  1;
            $geomean[$a->id_indikator2][$a->id_indikator2] =  1;
        }
        //total matriks penilaian
        foreach ($indikator as $ahp1) {
            $g = 0;

            foreach ($indikator as $ahp2) {
                $g += $geomean[$ahp2->id][$ahp1->id];
                $total[$ahp1->id] = $g;
            }
        }

        foreach ($indikator as $ahp1) {
            foreach ($indikator as $ahp2) {
                $nilai_n = $geomean[$ahp2->id][$ahp1->id] / $total[$ahp1->id];
                $nilai[$ahp2->id][$ahp1->id] = $nilai_n;
            }
        }
        //normalisasi
        foreach ($indikator as $ahp1) {
            $n = 0;
            foreach ($indikator as $ahp2) {
                $n += $nilai[$ahp1->id][$ahp2->id];
            }
            $bobot[$ahp1->id] = $n / $jml;
        }
        //eigen
        foreach ($indikator as $ahp1) {
            foreach ($indikator as $ahp2) {
                $nilai_e = $geomean[$ahp2->id][$ahp1->id] * $bobot[$ahp1->id];
                $nilaie[$ahp2->id][$ahp1->id] = $nilai_e;
            }
        }
        foreach ($indikator as $ahp1) {
            $n_e = 0;
            foreach ($indikator as $ahp2) {
                $n_e += $nilaie[$ahp1->id][$ahp2->id];
            }
            $total_eigen[$ahp1->id] = $n_e;
        }
        foreach ($indikator as $ahp1) {

            $nilai_eigen[$ahp1->id] = $total_eigen[$ahp1->id] / $bobot[$ahp1->id];
            $e_max += $nilai_eigen[$ahp1->id];
            $eigen_max['SDM'] = $e_max / $jml;
        }
        $ci['SDM'] = ($eigen_max['SDM'] - $jml) / ($jml - 1);
        $r1['SDM'] = 0.9;
        $cr['SDM'] = $ci['SDM'] / $r1['SDM'];
        /*
        End Mencari Bobot Lokal & Global Kategori SDM
         */

        /*
        Mencari Bobot Lokal & Global Kategori PRODUKSI
         */
        $ahps_produksi = Matriks_ahp::where('kategori', 'PRODUKSI')->get();
        $indikator_produksi =  Indikator::where('tahap', 2)->where('kategori', 'PRODUKSI')->get()->sortBy('id');
        $jml_produksi =  Indikator::where('tahap', 2)->where('kategori', 'PRODUKSI')->get()->sortBy('id')->count();
        $geomean = null;
        $total = null;
        $e_max = 0;
        // matriks penilaian
        foreach ($ahps_produksi as $a) {
            $ahp = Ahp::where('id_matriks', $a->id)->get();
            $ahp_n = Ahp::where('id_matriks', $a->id)->get()->count();
            $kali = 1;
            foreach ($ahp as $ahp) {
                $kali *= $ahp->nilai;
            }
            $geomean[$a->id_indikator][$a->id_indikator2] =  number_format(pow($kali, (float)(1 / $ahp_n)), 4);
            $geomean[$a->id_indikator2][$a->id_indikator] =  number_format(1 / (pow($kali, (float)(1 / $ahp_n))), 4);
            $geomean[$a->id_indikator][$a->id_indikator] =  1;
            $geomean[$a->id_indikator2][$a->id_indikator2] =  1;
        }
        //total matriks penilaian
        foreach ($indikator_produksi as $ahp1) {
            $g = 0;

            foreach ($indikator_produksi as $ahp2) {
                $g += $geomean[$ahp2->id][$ahp1->id];
                $total[$ahp1->id] = $g;
            }
        }

        foreach ($indikator_produksi as $ahp1) {
            foreach ($indikator_produksi as $ahp2) {
                $nilai_n = $geomean[$ahp2->id][$ahp1->id] / $total[$ahp1->id];
                $nilai[$ahp2->id][$ahp1->id] = $nilai_n;
            }
        }
        //normalisasi
        foreach ($indikator_produksi as $ahp1) {
            $n = 0;
            foreach ($indikator_produksi as $ahp2) {
                $n += $nilai[$ahp1->id][$ahp2->id];
            }
            $bobot[$ahp1->id] = number_format($n / $jml_produksi, 4);
        }
        //eigen
        foreach ($indikator_produksi as $ahp1) {
            foreach ($indikator_produksi as $ahp2) {
                $nilai_e = $geomean[$ahp2->id][$ahp1->id] * $bobot[$ahp1->id];
                $nilaie[$ahp2->id][$ahp1->id] = $nilai_e;
            }
        }
        foreach ($indikator_produksi as $ahp1) {
            $n_e = 0;
            foreach ($indikator_produksi as $ahp2) {
                $n_e += $nilaie[$ahp1->id][$ahp2->id];
            }
            $total_eigen[$ahp1->id] = $n_e;
        }
        foreach ($indikator_produksi as $ahp1) {

            $nilai_eigen[$ahp1->id] = $total_eigen[$ahp1->id] / $bobot[$ahp1->id];
            $e_max += $nilai_eigen[$ahp1->id];
            $eigen_max['PRODUKSI'] = $e_max / $jml_produksi;
        }
        $ci['PRODUKSI'] = ($eigen_max['PRODUKSI'] - $jml_produksi) / ($jml_produksi - 1);
        $r1['PRODUKSI'] = 0.58;
        $cr['PRODUKSI'] = $ci['PRODUKSI'] / $r1['PRODUKSI'];
        /*
        End Mencari Bobot Lokal & Global Kategori PRODUKSI
         */
        /*
        Mencari Bobot Lokal & Global Kategori Transportasi
         */
        $ahps_transportasi = Matriks_ahp::where('kategori', 'PENYIMPANAN&TRANSPORTASI')->get();
        $indikator_transportasi =  Indikator::where('tahap', 2)->where('kategori', 'PENYIMPANAN&TRANSPORTASI')->get()->sortBy('id');
        $jml_transportasi =  Indikator::where('tahap', 2)->where('kategori', 'PENYIMPANAN&TRANSPORTASI')->get()->sortBy('id')->count();
        $geomean = null;
        $total = null;
        $e_max = 0;
        // matriks penilaian
        foreach ($ahps_transportasi as $a) {
            $ahp = Ahp::where('id_matriks', $a->id)->get();
            $ahp_n = Ahp::where('id_matriks', $a->id)->get()->count();
            $kali = 1;
            foreach ($ahp as $ahp) {
                $kali *= $ahp->nilai;
            }
            $geomean[$a->id_indikator][$a->id_indikator2] =  number_format(pow($kali, (float)(1 / $ahp_n)), 4);
            $geomean[$a->id_indikator2][$a->id_indikator] =  number_format(1 / (pow($kali, (float)(1 / $ahp_n))), 4);
            $geomean[$a->id_indikator][$a->id_indikator] =  1;
            $geomean[$a->id_indikator2][$a->id_indikator2] =  1;
        }
        //total matriks penilaian
        foreach ($indikator_transportasi as $ahp1) {
            $g = 0;

            foreach ($indikator_transportasi as $ahp2) {
                $g += $geomean[$ahp2->id][$ahp1->id];
                $total[$ahp1->id] = $g;
            }
        }

        foreach ($indikator_transportasi as $ahp1) {
            foreach ($indikator_transportasi as $ahp2) {
                $nilai_n = $geomean[$ahp2->id][$ahp1->id] / $total[$ahp1->id];
                $nilai[$ahp2->id][$ahp1->id] = $nilai_n;
            }
        }
        //normalisasi
        foreach ($indikator_transportasi as $ahp1) {
            $n = 0;
            foreach ($indikator_transportasi as $ahp2) {
                $n += $nilai[$ahp1->id][$ahp2->id];
            }
            $bobot[$ahp1->id] = number_format($n / $jml_transportasi, 4);
        }
        //eigen
        foreach ($indikator_transportasi as $ahp1) {
            foreach ($indikator_transportasi as $ahp2) {
                $nilai_e = $geomean[$ahp2->id][$ahp1->id] * $bobot[$ahp1->id];
                $nilaie[$ahp2->id][$ahp1->id] = $nilai_e;
            }
        }
        foreach ($indikator_transportasi as $ahp1) {
            $n_e = 0;
            foreach ($indikator_transportasi as $ahp2) {
                $n_e += $nilaie[$ahp1->id][$ahp2->id];
            }
            $total_eigen[$ahp1->id] = $n_e;
        }
        foreach ($indikator_transportasi as $ahp1) {

            $nilai_eigen[$ahp1->id] = $total_eigen[$ahp1->id] / $bobot[$ahp1->id];
            $e_max += $nilai_eigen[$ahp1->id];
            $eigen_max['PENYIMPANAN&TRANSPORTASI'] = $e_max / $jml_transportasi;
        }
        $ci['PENYIMPANAN&TRANSPORTASI'] = ($eigen_max['PENYIMPANAN&TRANSPORTASI'] - $jml_transportasi) / ($jml_transportasi - 1);
        $r1['PENYIMPANAN&TRANSPORTASI'] = 0;
        $cr['PENYIMPANAN&TRANSPORTASI'] = 0;
        /*
        End Mencari Bobot Lokal & Global Kategori Transportasi
         */
        /*
        Mencari Bobot Lokal & Global Kategori Halal
         */
        $ahps_halal = Matriks_ahp::where('kategori', 'INTEGRITASHALAL')->get();
        $indikator_halal =  Indikator::where('tahap', 2)->where('kategori', 'INTEGRITASHALAL')->get()->sortBy('id');
        $jml_halal =  Indikator::where('tahap', 2)->where('kategori', 'INTEGRITASHALAL')->get()->sortBy('id')->count();
        $geomean = null;
        $total = null;
        $e_max = 0;
        // matriks penilaian
        foreach ($ahps_halal as $a) {
            $ahp = Ahp::where('id_matriks', $a->id)->get();
            $ahp_n = Ahp::where('id_matriks', $a->id)->get()->count();
            $kali = 1;
            foreach ($ahp as $ahp) {
                $kali *= $ahp->nilai;
            }
            $geomean[$a->id_indikator][$a->id_indikator2] =  number_format(pow($kali, (float)(1 / $ahp_n)), 4);
            $geomean[$a->id_indikator2][$a->id_indikator] =  number_format(1 / (pow($kali, (float)(1 / $ahp_n))), 4);
            $geomean[$a->id_indikator][$a->id_indikator] =  1;
            $geomean[$a->id_indikator2][$a->id_indikator2] =  1;
        }
        //total matriks penilaian
        foreach ($indikator_halal as $ahp1) {
            $g = 0;

            foreach ($indikator_halal as $ahp2) {
                $g += $geomean[$ahp2->id][$ahp1->id];
                $total[$ahp1->id] = $g;
            }
        }

        foreach ($indikator_halal as $ahp1) {
            foreach ($indikator_halal as $ahp2) {
                $nilai_n = $geomean[$ahp2->id][$ahp1->id] / $total[$ahp1->id];
                $nilai[$ahp2->id][$ahp1->id] = $nilai_n;
            }
        }
        //normalisasi
        foreach ($indikator_halal as $ahp1) {
            $n = 0;
            foreach ($indikator_halal as $ahp2) {
                $n += $nilai[$ahp1->id][$ahp2->id];
            }
            $bobot[$ahp1->id] = number_format($n / $jml_halal, 4);
        }
        //eigen
        foreach ($indikator_halal as $ahp1) {
            foreach ($indikator_halal as $ahp2) {
                $nilai_e = $geomean[$ahp2->id][$ahp1->id] * $bobot[$ahp1->id];
                $nilaie[$ahp2->id][$ahp1->id] = $nilai_e;
            }
        }
        foreach ($indikator_halal as $ahp1) {
            $n_e = 0;
            foreach ($indikator_halal as $ahp2) {
                $n_e += $nilaie[$ahp1->id][$ahp2->id];
            }
            $total_eigen[$ahp1->id] = $n_e;
        }
        foreach ($indikator_halal as $ahp1) {

            $nilai_eigen[$ahp1->id] = $total_eigen[$ahp1->id] / $bobot[$ahp1->id];
            $e_max += $nilai_eigen[$ahp1->id];
            $eigen_max['INTEGRITASHALAL'] = $e_max / $jml_halal;
        }
        $ci['INTEGRITASHALAL'] = ($eigen_max['INTEGRITASHALAL'] - $jml_halal) / ($jml_halal - 1);
        $r1['INTEGRITASHALAL'] = 1.12;
        $cr['INTEGRITASHALAL'] = $ci['INTEGRITASHALAL'] / $r1['INTEGRITASHALAL'];

        /*
        End Mencari Bobot Lokal & Global Kategori Halal
         */
        return view('penguji.home', compact('bobot'));
    }
    public function tahap1()
    {
        $industri = Industri::get();
        $no = 1;
        return view('penguji.tahap1', compact('industri', 'no'));
    }
    public function tahap1_create($id)
    {
        $industri = Industri::where('id', $id)->first();
        $indikator = Indikator::where('tahap', 1)->get();

        $i = 1;

        return view('penguji.tahap1_create', compact('industri', 'indikator', 'i'));
    }
    public function tahap1_store($id, Request $request)
    {

        $nilai = $request->indikator1 + $request->indikator2 + $request->indikator3 + $request->indikator4 + $request->indikator5 + $request->indikator6;

        Industri::where('id', $id)
            ->update(
                [
                    'indikator_1' => $request->indikator1,
                    'indikator_2' => $request->indikator2,
                    'indikator_3' => $request->indikator3,
                    'indikator_4' => $request->indikator4,
                    'indikator_5' => $request->indikator5,
                    'indikator_6' => $request->indikator6,
                    'nilai_1' => $nilai
                ]
            );

        return redirect(route('tahap1'));
    }
    public function tahap2()
    {
        $industri = Industri::where('nilai_1', 6)->get();
        $no = 1;
        return view('penguji.tahap2', compact('industri', 'no'));
    }

    public function tahap2_create($id)
    {
        $industri = Industri::where('id', $id)->first();
        $indikator = Indikator::where('tahap', 2)->get();

        $i = 1;

        return view('penguji.tahap2_create', compact('industri', 'indikator', 'i'));
    }

    public function tahap2_add(Request $r, $id)
    {

        dd($r)->all();
    }

    public function delete($id)
    {
        $patch = Penguji::findOrFail($id);
        $patch->delete();
        return redirect(Route('penguji'));
    }
}
