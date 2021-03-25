@extends('layouts.penguji.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Tahap 1</h1>
    </div>

    <div class="row">


        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 p-2">
                <table width="100%" class=" table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Industri</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($industri as $item)


                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if (is_null($item->nilai_1))
                                Belum Dinilai
                                @elseif($item->nilai_1<6) Tidak Lolos Tahap 1 (Skor : {{ $item->nilai_1 }})
                                    @elseif($item->
                                    nilai_1==6) Lolos Tahap 1 (Skor : {{ $item->nilai_1 }})
                                    @endif
                            </td>
                            <td>
                                <div class="button-group">
                                    @if (is_null($item->nilai_1))
                                    <a href="{{route('tahap1.create',$item->id)}}"><button
                                            class="btn-success btn">Berikan
                                            Nilai</button></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    @endsection
