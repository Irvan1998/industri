@extends('layouts.master')

@section('content')

<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>INDIKATOR</b></h1>
        <a class="btn btn-success" href="{{route('indikator.create')}}">Tambah </a>
    </div>
    <div class="row ">
        <div class="card col-md-12 shadow mb-4 ">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center">Data Indikator</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th style="width:60%">Name</th>
                                <th style="width:60%">Kategori</th>
                                <th style="width:10%">Tahap</th>
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
                                <td>{{$data->kategori}}</td>
                                <td>{{$data->tahap}}</td>

                                <td>
                                    <a class="btn btn-primary" href="{{route('indikator.detail',$data->id)}}">Detail</a>
                                    <a class="btn btn-danger" href="{{route('indikator.delete',$data->id)}}">Delete</a>
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