@extends('layouts.master')

@section('content')

<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Matriks</b></h1>
        <a class="btn btn-success" href="{{route('matriks.create')}}">Tambah </a>
    </div>
    <div class="row ">
        <div class="card col-md-12 shadow mb-4 ">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center">Data Matriks</h5>
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
                                    <a class="btn btn-warning" href="{{route('matriks.edit',$data->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('matriks.delete',$data->id)}}">Delete</a>
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
