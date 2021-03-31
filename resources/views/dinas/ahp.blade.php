@extends('layouts.dinas.master')

@section('content')

<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>AHP</b></h1>
        {{-- <a class="btn btn-success" href="{{route('matriks.create')}}">Tambah </a> --}}
    </div>
    <div class="row ">
        <div class="card col-md-12 shadow mb-4 ">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center">Data AHP</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th style="width:20%">Indikator 1</th>
                                <th style="width:20%">Indikator 2</th>
                                <th style="width:30%">Kategori</th>
                                <th style="width:20%">Opsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($data->count() == 0)
                            <tr>
                                <td colspan="6">Tidak Ada Data</td>
                            </tr>
                            @else
                            @foreach($data as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->indikator->nama}}</td>
                                <td>{{$data->indikator2->nama}}</td>
                                <td>{{$data->kategori}}</td>
                                <td>
                                    <button class="btn-warning btn btn-sm" data-toggle="modal"
                                        data-target="#show-item-{{ $data->id }}">Masukan Nilai</button>
                                    <div class="modal fade" id="show-item-{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form method="POST" action="{{ route('dinas.ahp.add') }}">
                                                        @csrf

                                                        <div class="mb-4">
                                                            <label for="message-text" class="col-form-label">Nilai
                                                                (1-9)</label>
                                                            <input class="form-control" name="nilai" type="number">
                                                            <input type="text" name="id_user" id="" hidden
                                                                value="{{ Session('id') }}">
                                                            <input type="text" name="id_matriks" id="" hidden
                                                                value="{{ $data->id }}">
                                                            <input type="text" name="kategori" id="" hidden
                                                                value="{{ $data->kategori }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
