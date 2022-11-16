@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM UNGGAH PERMOHONAN CUTI</b></h4>
            </div>
            <div class="card-body">

<!-- membuat formnya -->
<!-- bagian Nama -->
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <form action="/simpan_cuti" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        @if (auth()->user()->level == "karyawan")
                        <input type="text" id="Alasan_Cuti" value="{{Auth::user()->Karyawan->Nama_Karyawan}}" readonly class="form-control">
                        @endif
                        @if (auth()->user()->level == "admin")
                        <select id="karyawan_id" name="karyawan_id" class="form-control">
                            @foreach ($karyawan as $k)
                                <option value="{{$k->karyawan_id}}">{{$k->Nama_Karyawan}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    {{-- <x-validate-error-message name="karyawan_id"/> --}}
                </div>
<!-- bagian Jabatan -->
                {{-- <div class="form-group row">
                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" id="Jabatan" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan">
                            {{-- <x-validate-error-message name="Jabatan"/> --}}

<!-- bagian Alasan Cuti -->
                <div class="form-group row">
                    <label for="Alasan_Cuti" class="col-sm-2 col-form-label">Alasan Cuti</label>
                    <div class="col-sm-10">
                        <input type="text" id="Alasan_Cuti" name="Alasan_Cuti" class="form-control" placeholder="Alasan Cuti">
                            {{-- <x-validate-error-message name="Alasan_Cuti"/> --}}
                    </div>
                </div>


<!-- bagian tanggal -->
                <div class="form-group row">
                    <label for="Tanggal_Mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" id="Tanggal_Mulai" name="Tanggal_Mulai" class="form-control"/>
                            {{-- <x-validate-error-message name="Tanggal_Mulai"/> --}}
                        </div>
                </div>
                <div class="form-group row">
                    <label for="Tanggal_Selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" id="Tanggal_Selesai" name="Tanggal_Selesai" class="form-control"/>
                            {{-- <x-validate-error-message name="Tanggal_Selesai"/> --}}
                        </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                    <div>
                </div>
            </form>
            </div>
        </div>
    </div>
  </div>

@endsection
