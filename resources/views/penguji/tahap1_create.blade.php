@extends('layouts.penguji.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Tahap 1</h1>
    </div>

    <div class="row">

        <div class="col-xl-11 col-lg-10">
            <div class="card shadow mb-4">
                <form action="{{route('tahap1.store',$industri->id)}}" method="post" class="m-3" enctype="multipart/form-data" class="m-3">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>Nama Industri</label>
                        <input name="Nama" value="{{ $industri->nama }}" class="form-control" type="text" placeholder="{{ $industri->nama }}" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label>Penilaian Setiap Indikator</label>
                    </div>
                    @foreach ($indikator as $item)
                    <div class="form-group">
                        <strong><label>Indikator {{ $i }}</label><br></strong>
                        <label>{{ $item->nama }}</label>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p>skala :</p>
                                @foreach (App\Skala::where('id_indikator',$item->id)->get() as $k)
                                <p>- {{$k->nama}}</p>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="indikator{{$i }}" id="" value="1" checked>
                            <label class="form-check-label">
                                Iya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="indikator{{$i }}" id="" value="0">
                            <label class="form-check-label">
                                Tidak
                            </label>
                        </div>
                    </div>
                    @php
                    $i++
                    @endphp
                    @endforeach

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    @endsection