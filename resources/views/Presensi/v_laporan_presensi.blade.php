@extends('layouts.index')


@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fa-lg fa-regular fa-clipboard"></i> Laporan Presensi</h3><hr>
                <form action="{{route("create_laporan_presensi")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input required type="time" class="form-control" name="jam_mulai" id="jam_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input required type="time" class="form-control" name="jam_selesai" id="jam_selesai">
                    </div>
                    <div class="mb-3">
                        <label for="uraian_pekerjaan" class="form-label">Uraian Pekerjaan</label>
                        <input required type="text" class="form-control" name="uraian_pekerjaan" id="uraian_pekerjaan">
                    </div>
                    <div class="mb-3">
                        <label for="output_pekerjaan" class="form-label">output Pekerjaan</label>
                        <input required type="text" class="form-control" name="output_pekerjaan" id="output_pekerjaan">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input required type="file" class="form-control" name="file" id="file" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
