@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-75">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM EDIT KARYAWAN</b></h4>
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
            <form action={{ url('update_karyawan', $karyawan->karyawan_id) }} method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Nama_Karyawan}}" id="Nama_Karyawan" name="Nama_Karyawan" class="form-control" placeholder="Masukkan Nama Karyawan">
                            {{-- <x-validate-error-message name="Nama_Karyawan"/> --}}
                    </div>
                </div>
<!-- bagian Jabatan_____cek -->
                <div class="form-group row">
                    <label for="Nama_Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">

                        <select name="jabatan_id" id="jabatan_id" class="form-control">
                            @foreach ($jabatan as $j)
                            <option value="{{$j->jabatan_id}}"> {{$j->Nama_Jabatan}}</option>

                            @endforeach
                        </select>


                        {{-- <x-validate-error-message name="Nama_Jabatan"/> --}}
                    </div>
                </div>

<!-- bagian Pendidikan -->
                <div class="form-group row">
                    <label for="Tingkat_Pendidikan" class="col-sm-2 col-form-label">Tingkat Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->pendidikan->Tingkat_Pendidikan}}"  id="Tingkat_Pendidikan" name="Tingkat_Pendidikan" class="form-control" placeholder="Masukkan Tingkat Pendidikan">
                            {{-- <x-validate-error-message name="Tingkat_Pendidikan"/> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Tahun_Lulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->pendidikan->Tahun_Lulus}}"  id="Tahun_Lulus" name="Tahun_Lulus" class="form-control" placeholder="Masukkan Tahun Lulus">
                            {{-- <x-validate-error-message name="Tahun_Lulus"/> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Nama_Sekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->pendidikan->Nama_Sekolah}}"  id="Nama_Sekolah" name="Nama_Sekolah" class="form-control" placeholder="Masukkan Nama Sekolah">
                            {{-- <x-validate-error-message name="Nama_Sekolah"/> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="No_Ijazah" class="col-sm-2 col-form-label">Nomor Ijazah</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->pendidikan->No_Ijazah}}"  id="No_Ijazah" name="No_Ijazah" class="form-control" placeholder="Masukkan Nomor Ijazah">
                            {{-- <x-validate-error-message name="No_Ijazah"/> --}}
                    </div>
                </div>
<!-- bagian Devisi -->
                <div class="form-group row">
                    <label for="devisi_id" class="col-sm-2 col-form-label">Nama Devisi</label>
                    <div class="col-sm-10">
                        <select name="devisi_id" id="devisi_id" class="form-control">
                            @foreach ($devisi as $d)
                                <option value="{{$d->devisi_id}}">{{$d->Nama_Devisi}}</option>

                            @endforeach
                        </select>
                        {{-- <x-validate-error-message name="devisi_id"/> --}}
                    </div>
                </div>
<!-- bagian Alamat_Karyawan -->
                <div class="form-group row">
                    <label for="Alamat_Karyawan" class="col-sm-2 col-form-label">Alamat Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Alamat_Karyawan}}"  id="Alamat_Karyawan" name="Alamat_Karyawan" class="form-control" placeholder="Masukkan Alamat Karyawan">
                            {{-- <x-validate-error-message name="Alamat_Karyawan"/> --}}
                    </div>
                </div>
<!-- bagian Tempat_Lahir -->
                <div class="form-group row">
                    <label for="Tempat_Lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Tempat_Lahir}}"  id="Tempat_Lahir" name="Tempat_Lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
                            {{-- <x-validate-error-message name="Tempat_Lahir"/> --}}
                    </div>
                </div>
<!-- bagian Tanggal_Lahir -->
                <div class="form-group row">
                    <label for="Tanggal_Lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-10">
                            <input type="date" value="{{$karyawan->Tanggal_Lahir}}"  id="Tanggal_Lahir" name="Tanggal_Lahir" class="form-control"/>
                            {{-- <x-validate-error-message name="Tanggal_Lahir"/> --}}
                        </div>
                </div>
<!-- bagian Agama -->
                <div class="form-group row">
                    <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Agama}}"  id="Agama" name="Agama" class="form-control" placeholder="Masukkan Agama">
                            {{-- <x-validate-error-message name="Agama"/> --}}
                    </div>
                </div>
<!-- bagian Golongan_Darah -->
                <div class="form-group row">
                    <label for="Golongan_Darah" class="col-sm-2 col-form-label">Golongan Darah</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Golongan_Darah}}"  id="Golongan_Darah" name="Golongan_Darah" class="form-control" placeholder="Masukkan Golongan Darah">
                            {{-- <x-validate-error-message name="Golongan_Darah"/> --}}
                    </div>
                </div>
<!-- bagian Status_Pernikahan -->
                <div class="form-group row">
                    <label for="Status_Pernikahan" class="col-sm-2 col-form-label">Status Pernikahan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$karyawan->Status_Pernikahan}}"  id="Status_Pernikahan" name="Status_Pernikahan" class="form-control" placeholder="Masukkan Status Pernikahan">
                            {{-- <x-validate-error-message name="Status_Pernikahan"/> --}}
                    </div>
                </div>
<!-- bagian Jumlah_Anak -->
                <div class="form-group row">
                    <label for="Jumlah_Anak" class="col-sm-2 col-form-label">Jumlah Anak</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$karyawan->Jumlah_Anak}}"  id="Jumlah_Anak" name="Jumlah_Anak" class="form-control" placeholder="Masukkan Jumlah Anak">
                            {{-- <x-validate-error-message name="Jumlah_Anak"/> --}}
                    </div>
                </div>
<!-- bagian No_Hp -->
                <div class="form-group row">
                    <label for="No_Hp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$karyawan->No_Hp}}"  id="No_Hp" name="No_Hp" class="form-control" placeholder="Masukkan No Hp">
                            {{-- <x-validate-error-message name="No_Hp"/> --}}
                    </div>
                </div>
<!-- bagian Mulai_Kerja -->
                <div class="form-group row">
                    <label for="Mulai_Kerja" class="col-sm-2 col-form-label">Mulai Kerja</label>
                    <div class="col-sm-10">
                        <input type="date" value="{{$karyawan->Mulai_Kerja}}"  id="Mulai_Kerja" name="Mulai_Kerja" class="form-control" placeholder="Masukkan Mulai Kerja">
                            {{-- <x-validate-error-message name="Mulai_Kerja"/> --}}
                    </div>
                </div>

                <div class="form-group-row">
                    <label for="image">Masukkan File</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>

<!-- bagian Siuuuuuuuuu -->
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
