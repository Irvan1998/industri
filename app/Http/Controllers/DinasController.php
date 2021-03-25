<?php

namespace App\Http\Controllers;

use App\Dinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DinasController extends Controller
{
    public function index()
    {
        return view('dinas.home');
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
}
