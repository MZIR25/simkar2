@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-75">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM UNGGAH GAJI</b></h4>
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
            <form action="/simpan_gaji" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="karyawan_id" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <select id="karyawan_id" name="karyawan_id" class="form-control">
                            @foreach ($karyawan as $k)
                                <option value="{{$k->karyawan_id}}">{{$k->Nama_Karyawan}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <x-validate-error-message name="karyawan_id"/> --}}
                </div>
<!-- bagian Jabatan -->
                {{-- <div class="form-group row">
                    <label for="Nama_Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select id="karyawan_id" name="Nama_Jabatan" class="form-control">


                            @foreach ($karyawan as $k)
                                <option value="{{$k->karyawan_id}}">{{$k->Jabatan->Nama_Jabatan}}</option>

                            @endforeach

                        </select>
                    </div>
                    {{-- <x-validate-error-message name="Jabatan"/> --}}

<!-- bagian Gaji Pokok -->
                {{-- <div class="form-group row">
                    <label for="Gaji_Pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                    <div class="col-sm-10">
                        <input type="number"  id="Gaji_Pokok" name="Gaji_Pokok" class="form-control" placeholder="Masukkan Gaji Pokok">
                            <x-validate-error-message name="Gaji_Pokok"/>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="Gaji_Pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                    <div class="input-group-prepend col-sm-10">
                      <span class="input-group-text">Rp.</span>
                    <input type="number" id="Gaji_Pokok" name="Gaji_Pokok" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                </div>
<!-- bagian Pajak BPJS -->
                {{-- <div class="form-group row">
                    <label for="Pajak_Bpjs" class="col-sm-2 col-form-label">Pajak Bpjs</label>
                    <div class="col-sm-10">
                        <input type="number" id="Pajak_Bpjs" name="Pajak_Bpjs" class="form-control" placeholder="Masukkan Pajak Bpjs">
                            <x-validate-error-message name="Pajak_Bpjs"/>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="Pajak_Bpjs" class="col-sm-2 col-form-label">Pajak BPJS</label>
                    <div class="input-group-prepend col-sm-10">
                      <span class="input-group-text">Rp.</span>
                    <input type="number" id="Pajak_Bpjs" name="Pajak_Bpjs" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                </div>
<!-- bagian Jumlah gaji -->
                {{-- <div class="form-group row">
                    <label for="Jumlah_Gaji" class="col-sm-2 col-form-label">Jumlah Gaji</label>
                    <div class="col-sm-10">
                        <input type="integer" id="Jumlah_Gaji" name="Jumlah_Gaji" class="form-control" placeholder="Masukkan Jumlah Gaji">

                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="Jumlah_Gaji" class="col-sm-2 col-form-label">Jumlah Gaji</label>
                    <div class="input-group-prepend col-sm-10">
                      <span class="input-group-text">Rp.</span>
                    <input type="number" id="Jumlah_Gaji" name="Jumlah_Gaji" class="form-control" aria-label="Amount (to the nearest dollar)">
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
