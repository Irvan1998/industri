<?php

namespace App\Http\Controllers;

use App\Indikator;
use App\Skala;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class IndikatorController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Indikator::get();
        return view('indikator.index', compact('data', 'no'));
    }

    public function create()
    {
        return view('indikator.create');
    }

    public function add(Request $r)
    {
        Indikator::create([
            'nama' => $r->nama,
            'kategori' => $r->kategori,
            'tahap' => $r->tahap
        ]);
        return redirect(route('indikator'));
    }

    public function detail($id)
    {
        $no = 1;
        $data = Skala::where('id_indikator', $id)->get();
        $indikator = Indikator::where('id', $id)->first();

        return view('indikator.detail', compact('data', 'indikator', 'no'));
    }

    public function update(Request $r, $id)
    {

        $data = Indikator::where('id', $id)->first();
        $data->update([
            'nama' => $r->nama,
            'kategori' => $r->kategori,
            'tahap' => $r->tahap
        ]);
        return redirect(route('indikator.detail', $id));
    }

    public function delete($id)
    {
        $patch = Indikator::findOrFail($id);
        $patch->delete();
        return redirect(Route('indikator'));
    }
}
