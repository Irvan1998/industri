<?php

namespace App\Http\Controllers;

use App\Industri;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndustriController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Industri::get();
        return view('industri.index', compact('data', 'no'));
    }

    public function create()
    {
        return view('industri.create');
    }

    public function add(Request $r)
    {
        Industri::create([
            'nama' => $r->nama,
            'keterangan' => $r->keterangan
        ]);

        return redirect(Route('industri'));
    }

    public function delete($id)
    {
        $patch = Industri::findOrFail($id);
        $patch->delete();
        return redirect(Route('industri'));
    }

    public function edit($id)
    {
        $data = Industri::where('id', $id)->first();
        // dd($data);
        return view('industri.edit', compact('data'));
    }

    public function update(Request $r, $id)
    {
        $data = Industri::where('id', $id)->first();
        $data->update([
            'nama' => $r->nama,
            'keterangan' => $r->keterangan
        ]);
        return redirect(Route('industri'));
    }
}
