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
                                <th style="width:5%">No</th>
                                <th style="width:5%">Dimensi</th>
                                <th style="width:10%">Bobot Lokas Dimensi</th>
                                <th style="width:40%">Indikator</th>
                                <th style="width:20%">Bobot Indikator Lokal</th>
                                <th style="width:20%">Bobot Indikator Global</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($indikatorall as $in)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$in->kategori}}</td>
                                <td>0.25</td>
                                <td>{{$in->nama}}</td>
                                <td>{{$bobot[$in->id]}}</td>
                                <td>{{$bobot[$in->id]*0.25}}</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
                                <th class="text-dark" width="40%">Dimensi</th>
                                <th class="text-dark" width="10%">CI</th>
                                <th class="text-dark" width="10%">CR</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>contoh</td>
                                    <td>contoh</td>
                                    <td>contoh</td>
                                </tr>
                                <tr>
                                    <td>contoh</td>
                                    <td>contoh</td>
                                    <td>contoh</td>
                                </tr>
                                <tr>
                                    <td>contoh</td>
                                    <td>contoh</td>
                                    <td>contoh</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection