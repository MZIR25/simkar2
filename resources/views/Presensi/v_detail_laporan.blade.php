@extends('layouts.index')


@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fa-lg fa-regular fa-clipboard"></i> Laporan Presensi</h3><hr>
                @if (Auth::user()->level == "admin")
                <form action="{{route("update_laporan_presensi", $laporan->laporan_presensi_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    @endif
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="{{$laporan->jam_mulai}}" @if (Auth::user()->level != "admin") disabled @endif required>
                    </div>
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="{{$laporan->jam_selesai}}" @if (Auth::user()->level != "admin") disabled @endif required>
                    </div>
                    <div class="mb-3">
                        <label for="uraian_pekerjaan" class="form-label">Uraian Pekerjaan</label>
                        <input type="text" class="form-control" name="uraian_pekerjaan" id="uraian_pekerjaan" value="{{$laporan->uraian_pekerjaan}}" @if (Auth::user()->level != "admin") disabled @endif required>
                    </div>
                    <div class="mb-3">
                        <label for="output_pekerjaan" class="form-label">Output Pekerjaan</label>
                        <input type="text" class="form-control" name="output_pekerjaan" id="output_pekerjaan" value="{{$laporan->output_pekerjaan}}" @if (Auth::user()->level != "admin") disabled @endif required>
                    </div>
                    @if (Auth::user()->level == "admin")
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="file" class="form-label">Preview FIle</label><br>
                        <img src="{{asset("storage/laporan_presensi/" . $laporan->file)}}" width="400" alt="" accept="image/*">
                    </div>

                    @if (Auth::user()->level == "admin")

                    <button type="submit" class="btn btn-primary">Edit</button>
                    @endif
                    <a href="/presensi" style="padding-left: 20px;">Back</a>
                    @if (Auth::user()->level == "admin")
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
