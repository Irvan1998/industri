@extends('layouts.master')

@section('content')

<div class="container-fluid ">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Edit Industri</b></h1>

    </div>

    <div class="card col-md-10">

        <div class="card-body">
            <form method="get" action="{{ route('matriks.update',$data->id) }}">
                @csrf

                <div class="form-group row">
                    <div class="mb-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Indikator 1</label>
                        <select class="form-control" name="id_indikator">
                            @foreach ($indikator as $item)
                            <option value="{{ $item->id }}" {{$item->id == $data->id_indikator ? 'selected':''}}>
                                {{ ucfirst($item->nama) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Indikator 2</label>
                        <select class="form-control" name="id_indikator2">
                            @foreach ($indikator as $item)
                            <option value="{{ $item->id }}" {{$item->id == $data->id_indikator2 ? 'selected':''}}>
                                {{ ucfirst($item->nama) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                        <input type="text" class="form-control" value="{{ $data->kategori }}" name="kategori"
                            placeholder="Kategori">
                    </div>
                </div>
                <button type="submit" class="btn btn-google">Simpan</button>

            </form>
        </div>
    </div>
    @endsection
