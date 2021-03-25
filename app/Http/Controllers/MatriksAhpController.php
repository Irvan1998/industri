<?php

namespace App\Http\Controllers;

use App\Indikator;
use App\Matriks_ahp;
use Illuminate\Http\Request;

class MatriksAhpController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Matriks_ahp::get();
        return view('matriks.index', compact('data', 'no'));
    }

    public function create()
    {
        $indikator = Indikator::where('tahap', 2)->get();
        return view('matriks.create', compact('indikator'));
    }

    public function add(Request $r)
    {
        Matriks_ahp::create([
            'id_indikator' => $r->id_indikator,
            'id_indikator2' => $r->id_indikator2,
            'kategori' => $r->kategori
        ]);

        return redirect(Route('matriks'));
    }

    public function delete($id)
    {
        $patch = Matriks_ahp::findOrFail($id);
        $patch->delete();
        return redirect(Route('matriks'));
    }

    public function edit($id)
    {
        $data = Matriks_ahp::where('id', $id)->first();
        $indikator = Indikator::where('tahap', 2)->get();

        // dd($data);
        return view('matriks.edit', compact('data', 'indikator'));
    }

    public function update(Request $r, $id)
    {
        $data = Matriks_ahp::where('id', $id)->first();
        $data->update([
            'id_indikator' => $r->id_indikator,
            'id_indikator2' => $r->id_indikator2,
            'kategori' => $r->kategori
        ]);
        return redirect(Route('matriks'));
    }
}
