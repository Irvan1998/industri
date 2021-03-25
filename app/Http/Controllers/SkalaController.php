<?php

namespace App\Http\Controllers;

use App\Skala;
use Illuminate\Http\Request;

class SkalaController extends Controller
{
    public function add(Request $r, $id)
    {
        Skala::create([
            'nama' => $r->nama,
            'id_indikator' => $id,

        ]);
        return redirect(route('indikator.detail', $id));
    }

    public function delete($id)
    {
        $id_i = Skala::where('id', $id)->first();
        $patch = Skala::findOrFail($id);
        $patch->delete();
        return redirect(route('indikator.detail', $id_i->id_indikator));
    }
}
