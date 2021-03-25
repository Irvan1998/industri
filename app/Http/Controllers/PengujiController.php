<?php

namespace App\Http\Controllers;

use App\Indikator;
use App\Industri;
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
        return view('penguji.home');
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
