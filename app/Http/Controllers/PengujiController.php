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
        // matriks penilaian
        foreach ($ahps as $ahps) {
            $ahp = Ahp::where('id_matriks', $ahps->id)->get();
            $ahp_n = Ahp::where('id_matriks', $ahps->id)->get()->count();
            $kali = 1;
            foreach ($ahp as $ahp) {
                $kali *= $ahp->nilai;
            }
            $geomean[$ahps->id_indikator][$ahps->id_indikator2] =  number_format(pow($kali, (float)(1 / $ahp_n)), 4);
            $geomean[$ahps->id_indikator2][$ahps->id_indikator] =  number_format(1 / (pow($kali, (float)(1 / $ahp_n))), 4);
            $geomean[$ahps->id_indikator][$ahps->id_indikator] =  1;
            $geomean[$ahps->id_indikator2][$ahps->id_indikator2] =  1;
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
            $bobot[$ahp1->id] = number_format($n / $jml, 4);
        }
        //bobot global & lokal
        foreach ($indikator as $a) {
            echo 'bobot lokal ' . $a->id . '=' . $bobot[$a->id] . '<br>';
            echo 'bobot global ' . $a->id . '=' . $bobot[$a->id] * 0.25 . '<br>';
        }
        /*
        End Mencari Bobot Lokal & Global Kategori SDM
         */
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
