@extends('layouts.master')

@section('content')

<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b> Indikator</b></h1>

    </div>
    <div class="row">
        <div class="card col-md-12 mb-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-1 mt-2">
                <h4 class=" mb-0 text-gray-800"><b>Detail Indikator</b></h4>

                <button type="button" class="btn btn-warning mr-3" data-bs-toggle="modal" data-bs-target="#edit">Edit Indikator</button>

            </div>
            <hr>
            <div class="card-body">
                <h5><b class="mr-2"> Indikator :</b> {{$indikator->nama}}</h5>
                <h5><b class="mr-2"> Kategori :</b> {{$indikator->kategori}}</h5>
                <h5> <b class="mr-2">Tahap :</b> {{$indikator->tahap}}</h5>
            </div>
        </div>
        <div class="card col-md-12 mt-5">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-2">
                    <h4 class=" mb-0 text-gray-800"><b>Detail Skala</b></h4>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Skala</button>

                </div>
            </div>
            <div class=" card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th style="width:60%">Skala</th>

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
                                <td>{{$data->nama}}</td>


                                <td>

                                    <a class="btn btn-danger" href="{{route('skala.delete',$data->id )}}">Delete</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Skala Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('skala.add',$indikator->id) }}">
                    @csrf

                    <div class="mb-4">
                        <label for="message-text" class="col-form-label">Skala</label>
                        <textarea class="form-control" name="nama"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X </button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('indikator.update',$indikator->id) }}">
                    @csrf

                    <div class="mb-2">
                        <label for="message-text" class="col-form-label">Indikator</label>
                        <textarea class="form-control" style="height: 150px;" name="nama">{{$indikator->nama}}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="message-text" class="col-form-label">Kategori</label>
                        <textarea class="form-control" style="height: 150px;" name="kategori">{{$indikator->kategori}}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="message-text" class="col-form-label">Tahap</label>
                        <input class="form-control" name="tahap" value="{{$indikator->tahap}}"></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection