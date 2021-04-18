@extends('layouts.penguji.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Tahap 2</h1>
    </div>

    <div class="row">

        @foreach ($indikator as $item)
        <div class="col-xl-11 col-lg-10">
            <div class="card shadow mb-4">
                <form action="{{route('tahap2.add',$industri->id)}}" method="post" class="m-3" enctype="multipart/form-data" class="m-3">

                    @csrf
                    <div class="form-group">
                        <label>Nama Industri</label>
                        <input name="Nama" value="{{ $industri->nama }}" class="form-control" type="text" placeholder="{{ $industri->nama }}" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label>Penilaian Setiap Indikator</label>
                    </div>

                    <div class="form-group">
                        <strong><label>Indikator {{ $i }}</label><br></strong>
                        <label>{{ $item->nama }}</label>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p>skala :</p>
                                @foreach (App\Skala::where('id_indikator',$item->id)->get() as $k)
                                <p>- {{$k->nama}}</p>
                                @endforeach
                                @foreach(App\Nilai::where('id_indikator', $item->id)->get() as $ka)
                                @if($ka->count() == 0)
                                <p>Nilai : Belum DI isi</p>
                                @else
                                <p>Nilai : {{$ka->nilai}}
                                    @if($ka->nilai == 1 )
                                    <b>(Sangat Buruk)</b>
                                    @elseif($ka->nilai == 2 )
                                    <b>(Buruk)</b>
                                    @elseif($ka->nilai == 3 )
                                    <b> (Bagus)</b>
                                    @else($ka->nilai == 4 )
                                    <b>(Sangat Bagus)</b>
                                    @endif
                                </p>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <?php
                            $ka = DB::table('nilai_skala')->where('id_indikator', $item->id)->get();
                            $ke = DB::table('nilai_skala')->where('id_indikator', $item->id)->first();
                            ?>
                            @if($ka->count() == 0)


                            <input type="hide" name="id_indikator" value="{{$item->id}}" hidden>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nilai" id="" value="1" checked>
                                <label class="form-check-label">
                                    Sangat Buruk
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nilai" id="" value="2">
                                <label class="form-check-label">
                                    Buruk
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nilai" id="" value="3">
                                <label class="form-check-label">
                                    Bagus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nilai" id="" value="4">
                                <label class="form-check-label">
                                    Sangat Bagus
                                </label>
                            </div>
                            @else
                            @endif
                        </div>

                    </div>
                    @php
                    $i++
                    @endphp
                    <?php
                    $ka = DB::table('nilai_skala')->where('id_indikator', $item->id)->get();
                    $ke = DB::table('nilai_skala')->where('id_indikator', $item->id)->first();
                    ?>
                    @if($ka->count() == 0)


                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                    @else
                    @if($ke->id_user == Session('id'))
                    <div class="form-group">

                        <button type="button" class="btn btn-warning mr-3" data-bs-toggle="modal" data-bs-target="#edit-{{$item->id}}">Edit Indikator</button>
                    </div>

                    @else

                    @endif
                    @endif
                </form>
            </div>
        </div>

        <div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Nilai </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X </button>
                    </div>
                    <div class="modal-body">
                        <form method="Post" action="{{route('tahap2.update',$item->id)}}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <strong><label>Indikator {{$i - 1}} </label><br></strong>
                            <div class="card mb-4">
                                <label>{{ $item->nama }}</label>

                            </div>

                            <div>
                                <input type="hide" name="id_industri" value="{{$industri->id}}" hidden>
                                <input type="hide" name="id_indikator" value="{{$item->id}}" hidden>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nilai" id="" value="1">
                                    <label class="form-check-label">
                                        Sangat Buruk
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nilai" id="" value="2">
                                    <label class="form-check-label">
                                        Buruk
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nilai" id="" value="3">
                                    <label class="form-check-label">
                                        Bagus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nilai" id="" value="4">
                                    <label class="form-check-label">
                                        Sangat Bagus
                                    </label>
                                </div>
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
        @endforeach

    </div>
    <!-- End of Main Content -->

    @endsection