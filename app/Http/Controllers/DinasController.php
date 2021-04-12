<?php

namespace App\Http\Controllers;

use App\Ahp;
use App\Dinas;
use App\Indikator;
use App\Kategori;
use App\Matriks_ahp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DinasController extends Controller
{
    public function index()
    {
        return view('dinas.home');
    }
    public function ahp()
    {
        $no = 1;
        $user = Dinas::where('id', Session('id'))->first();
        $data = Matriks_ahp::get();
        // dd($user->id);
        return view('dinas.ahp', compact('data', 'no', 'user'));
    }

    public function dinas()
    {
        $data = Dinas::get();
        $no = 1;

        return view('dinas.index', compact('data', 'no'));
    }

    public function create()
    {
        return view('dinas.create');
    }

    public function add(Request $r)
    {
        Dinas::create([
            'name' => $r->nama,
            'email' => $r->email,
            'password' => Hash::make('12345678')
        ]);

        return redirect(route('dinas'));
    }
    public function delete($id)
    {
        $patch = Dinas::findOrFail($id);
        $patch->delete();
        return redirect(Route('dinas'));
    }
    public function add_ahp(Request $r)
    {
        Ahp::create([
            'id_user' => $r->id_user,
            'id_matriks' => $r->id_matriks,
            'kategori' => $r->kategori,
            'nilai' => $r->nilai,
        ]);
        return redirect(route('dinas.ahp'));
    }

    public function lap_ahp()
    {
        $indikatorall = Indikator::where('tahap', 2)->get();
        $no = 1;
        $kategori = Kategori::get();
        foreach ($kategori as $item) {
            $ahps = Matriks_ahp::where('kategori', $item->nama)->get();
            $indikator =  Indikator::where('tahap', 2)->where('kategori', $item->nama)->get()->sortBy('id');
            $jml =  Indikator::where('tahap', 2)->where('kategori', $item->nama)->get()->sortBy('id')->count();
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
                $eigen_max[$item->nama] = $e_max / $jml;
            }
            $ci[$item->nama] = ($eigen_max[$item->nama] - $jml) / ($jml - 1);
            if ($jml == 2) {
                $r1[$item->nama] = 0;
                $$cr[$item->nama] = $ci[$item->nama] / $r1[$item->nama];
            } elseif ($jml == 3) {
                $r1[$item->nama] = 0.58;
                $cr[$item->nama] = $ci[$item->nama] / $r1[$item->nama];
            } elseif ($jml == 4) {
                $r1[$item->nama] = 0.9;
                $cr[$item->nama] = $ci[$item->nama] / $r1[$item->nama];
            } elseif ($jml == 5) {
                $r1[$item->nama] = 1.12;
                $cr[$item->nama] = $ci[$item->nama] / $r1[$item->nama];
            }
        }




        return view('dinas.lap_ahp', compact('indikatorall', 'no', 'bobot', 'ci', 'cr'));
    }
}
