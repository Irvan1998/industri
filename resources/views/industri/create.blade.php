@extends('layouts.master')

@section('content')

<div class="container-fluid ">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Tambah Industri</b></h1>

  </div>

  <div class="card col-md-10">

    <div class="card-body">
      <form method="POST" action="{{ route('industri.add') }}">
        @csrf

        <div class="form-group row">
          <div class="mb-3 col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Industri">
          </div>
        </div>
        <div class="form-group row">
          <div class="mb-3 col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Keteranagn</label>
            <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-google">Simpan</button>

      </form>
    </div>
  </div>
  @endsection