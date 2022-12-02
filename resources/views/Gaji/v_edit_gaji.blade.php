@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-75">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM EDIT GAJI</b></h4>
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
            <form action="{{ url('update_gaji', $gaji->gaji_id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Nama_Karyawan}}" id="Nama_Karyawan" name="Nama_Karyawan" class="form-control" readonly>
                    </div>
                    {{-- <x-validate-error-message name="karyawan_id"/> --}}
                </div>

<!-- bagian Jabatan -->
                {{-- <div class="form-group row">
                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$gaji->Jabatan}}" id="Jabatan" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan">
                            {{-- <x-validate-error-message name="Jabatan"/> --}}

<!-- bagian Gaji Pokok -->
                <div class="form-group row">
                    <label for="Gaji_Pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                    <div class="input-group-prepend col-sm-10">
                      <span class="input-group-text">Rp.</span>
                    <input type="number" value="{{$gaji->Gaji_Pokok}}" id="Gaji_Pokok" name="Gaji_Pokok" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                </div>
<!-- bagian Status Nikah -->
                {{-- <div class="form-group row">
                    <label for="disabledSelect" class="col-sm-2 col-form-label">Status Menikah</label>
                    <div class="col-sm-10">
                    <select id="disabledSelect" name="Status_Menikah" class="form-control">

                        <option>{{$gaji->Status_Menikah}}</option>

                        <option>Menikah</option>
                        <option>Belum</option>
                        <option>Cerai</option>
                    </select>
                    </div>
                </div>
                {{-- <x-validate-error-message name="Status_Menikah"/> --}}
<!-- bagian Pajak Bpjs -->
                <div class="form-group row">
                    <label for="Pajak_Bpjs" class="col-sm-2 col-form-label">Pajak BPJS</label>
                    <div class="input-group-prepend col-sm-10">
                      <span class="input-group-text">Rp.</span>
                    <input type="number" value="{{$gaji->Pajak_Bpjs}}" id="Pajak_Bpjs" name="Pajak_Bpjs" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                </div>
<!-- bagian Jumlah Gaji -->
                <div class="form-group row">
                    <label for="Jumlah_Gaji" class="col-sm-2 col-form-label">Jumlah Gaji</label>
                    <div class="input-group-prepend col-sm-10">
                      <span class="input-group-text">Rp.</span>
                    <input type="number" value="{{$gaji->Jumlah_Gaji}}" id="Jumlah_Gaji" name="Jumlah_Gaji" class="form-control" aria-label="Amount (to the nearest dollar)">
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
