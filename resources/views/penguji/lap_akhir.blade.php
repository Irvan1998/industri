@extends('layouts.penguji.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Tahap 2</h1>
    </div>

    <div class="row">


        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 p-2">
                <table width="100%" class=" table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Industri</th>
                            <th>Nilai Tahap 1</th>
                            <th>Nilai Tahap 2</th>
                            <th>Penguji</th>
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
                                @elseif($item->nilai_1<6) Tidak Lolos Tahap 1 (Skor : {{ $item->nilai_1 }}) @elseif($item->
                                    nilai_1==6) Lolos Tahap 1 (Skor : {{ $item->nilai_1 }})
                                    @endif
                            </td>
                            <td>

                                <?php



                                $k = DB::table('nilai_skala')->where('id_industri', $item->id)->sum('nilai');
                                $ke = DB::table('nilai_skala')->where('id_industri', $item->id)->first();
                                $ku = DB::table('penguji')->where('id', $ke->id_user)->first();
                                ?>
                                <p> {{$k}}</p>

                            </td>
                            <td>
                                {{$ku->name}}
                            </td>
                            <td>
                                <div class="button-group">

                                    <a href="{{route('penguji.lap.detail',$item->id)}}"><button class="btn-primary btn">Detail Nilai</button></a>

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