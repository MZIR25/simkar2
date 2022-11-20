@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>DATA DIRI KARYAWAN</b></h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card">
                      <div class="row">
                        <div class="col-md-4">
                        <div class="img">
                          <img class="img-thumbnail" style="max-width: 100%;" src="{{asset('storage/'.$karyawan->image)}}">
                        </div>
                        </div>
                        <div class="col-md-8">
                          <div class="">
                          <table width="100%">
                      <tbody><tr>
                          <td valign="top">
                          <table width="100%" style="padding-left: 2px; padding-right: 13px;">
                            <tbody>
                              <tr>
                                <td width="25%" valign="top" class="textt">Nama Karyawan</td>
                                  <td width="2%">:</td>
                                  <td>{{$karyawan->Nama_Karyawan}}</td>
                              </tr>
                            <tr>
                                <td class="textt">Nama Jabatan</td>
                                  <td>:</td>
                                  <td>{{$jabatan->Nama_Jabatan}}</td>
                              </tr>
                            <tr>
                                <td class="textt">Tingkat Pendidikan</td>
                                  <td>:</td>
                                  <td>{{$karyawan->pendidikan->Tingkat_Pendidikan}}</td>
                              </tr>
                            <tr>
                                <td class="textt">Tahun Lulus</td>
                                  <td>:</td>
                                  <td>{{$karyawan->pendidikan->Tahun_Lulus}}</td>
                              </tr>
                            <tr>
                                <td class="textt">Nama Sekolah</td>
                                  <td>:</td>
                                  <td>{{$karyawan->pendidikan->Nama_Sekolah}}</td>
                              </tr>
                            <tr>
                                <td valign="top" class="textt">No Ijazah</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->pendidikan->No_Ijazah}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Nama Devisi</td>
                                  <td valign="top">:</td>
                                  <td>{{$devisi->Nama_Devisi}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Alamat Karyawan</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Alamat_Karyawan}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Tempat Lahir</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Tempat_Lahir}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Agama</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Agama}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Golongan Darah</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Golongan_Darah}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Status Pernikahan</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Status_Pernikahan}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Jumlah Anak</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Jumlah_Anak}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">No Hp</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->No_Hp}}</td>
                              </tr>
                              <tr>
                                <td valign="top" class="textt">Mulai Kerja</td>
                                  <td valign="top">:</td>
                                  <td>{{$karyawan->Mulai_Kerja}}</td>
                              </tr>
                          </tbody></table>
                          </td>
                      </tr>
                      </tbody></table>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>


<!-- membuat formnya -->
<!-- bagian Nama -->



@endsection
