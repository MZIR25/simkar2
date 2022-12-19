@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-75">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM EDIT PERMOHONAN CUTI</b></h4>
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
            <form action="{{ url('update_cuti', $cuti->cuti_id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Nama_Karyawan}}" id="Nama_Karyawan" name="Nama_Karyawan" class="form-control" readonly>
                    </div>
                    {{-- <x-validate-error-message name="karyawan_id"/> --}}
                </div>

                {{-- <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Nama_Karyawan}}" id="karyawan_id" name="karyawan_id" class="form-control" readonly>

                    </div>

                </div> --}}
<!-- bagian Jabatan -->
                {{-- <div class="form-group row">
                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->Jabatan}}" id="Jabatan" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan">
                            {{-- <x-validate-error-message name="Jabatan"/> --}}

<!-- bagian Alasan Cuti -->
                <div class="form-group row">
                    <label for="Alasan_Cuti" class="col-sm-2 col-form-label">Alasan Cuti</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->Alasan_Cuti}}" id="Alasan_Cuti" name="Alasan_Cuti" class="form-control" placeholder="Alasan Cuti">
                            {{-- <x-validate-error-message name="Alasan_Cuti"/> --}}
                    </div>
                </div>
<!-- bagian Status -->
                <div class="form-group row">
                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select value="{{$cuti->Status}}" id="Status" name="Status" class="form-control">
                            <option>Accept</option>
                            <option>Denied</option>
                        </select>
                        {{-- <x-validate-error-message name="Status"/> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Keterangan_Status" class="col-sm-2 col-form-label">Keterangan Status</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$cuti->Keterangan_Status}}" id="Keterangan_Status" name="Keterangan_Status" class="form-control" placeholder="Keterangan Status">
                            {{-- <x-validate-error-message name="Alasan_Cuti"/> --}}
                    </div>
                </div>

<!-- bagian tanggal -->
                <div class="form-group row">
                    <label for="Tanggal_Mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" value="{{$cuti->Tanggal_Mulai->format("Y-m-d"))}}" id="Tanggal_Mulai" name="Tanggal_Mulai" class="form-control"/>
                            {{-- <x-validate-error-message name="Tanggal_Mulai"/> --}}
                        </div>
                </div>
                <div class="form-group row">
                    <label for="Tanggal_Selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" value="{{$cuti->Tanggal_Selesai->format("Y-m-d"))}}" id="Tanggal_Selesai" name="Tanggal_Selesai" class="form-control"/>
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
