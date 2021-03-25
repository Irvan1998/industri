@extends('layouts.master')

@section('content')

<div class="container-fluid ">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Tambah Industri</b></h1>

    </div>

    <div class="card col-md-10">

        <div class="card-body">
            <form method="POST" action="{{ route('indikator.add') }}">
                @csrf

                <div class="form-group row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <textarea type="text" class="form-control" name="nama" placeholder="Indikator"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                        <textarea type="text" class="form-control" name="kategori" placeholder="Kategori"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlSelect1">Tahap</label>
                        <select class="form-control" name="tahap" id="exampleFormControlSelect1">
                            <option value="" disabled>Pilih Tahap</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-google">Simpan</button>

            </form>
        </div>
    </div>
    @endsection