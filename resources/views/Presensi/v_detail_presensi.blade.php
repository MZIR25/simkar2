@extends('layouts.index')


@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fa-lg fa-regular fa-clipboard"></i> Presensi</h3><hr>

                <div class="row g-3 p-2">
                    <div class="col-lg-7 col-md- col-sm-">
                        <h4 class="text-left">{{Carbon\Carbon::parse($presensi->tgl_presensi)->format("D, d m Y")}}</h4>
                        <div class="row g-3 mt-4 ">
                            <div class="col border mx-3 p-2">
                                <h5>Jadwal Kerja</h5>
                                08:00 - 15:30
                            </div>
                            <div class="col border mx-3 p-2">
                                <h5>Sekarang</h5>
                                {{Carbon\Carbon::now()->format("H:i")}}
                            </div>
                        </div>
                        <div class="border mt-4 mx-2">
                            <h5 class="text-center mt-3">Presensi</h5>
                            <div class="row g-3 mt-4 mb-3">
                                <div class="col  border mx-3 p-2">
                                    <h5>Masuk</h5>
                                    @if ($presensi)
                                        {{$presensi->jam_masuk}}
                                    @endif
                                </div>
                                <div class="col  border mx-3 p-2">
                                    <h5>Keluar</h5>
                                    @if ($presensi)
                                        {{$presensi->jam_keluar}}
                                    @endif
                                </div>
                                <div class="col  border mx-3 p-2">
                                    <h5>Terlambat</h5>
                                    {{$terlambat}} jam
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md- col-sm-">
                        <h4 class="text-center">Laporan Pekerjaan</h4>
                        <table class="table mt-4">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Uraian</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $l)
                                    <tr>
                                      <th scope="row">{{$loop->index + 1}}</th>
                                      <td>{{$l->uraian_pekerjaan}}</td>
                                      <td>
                                        <div class="">
                                            <a href="{{url('detail_laporan', $l->laporan_presensi_id)}}"><i class="fas fa-eye bg-success p-2 text-white rounded ml-2 mr-1" data-toggle="tooltip" title="Edit"></i></a>
                                            @if (Auth::user()->level == "admin")
                                                <form class="d-inline " action="{{ url('delete_laporan', $l->laporan_presensi_id) }} " method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 p-0 d-inline" type="submit">
                                                        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Hapus"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                      </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                        {{-- <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"> --}}
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
