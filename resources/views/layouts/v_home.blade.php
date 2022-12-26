@extends('layouts.index')


@section('content')

<div class="container-fluid p-5 m-">
    <div class="container ">
        <div class="text-center">
        <img src="{{asset('template/')}}/dist/img/logo_valtech.png"  alt="Valtech Logo" class="rounded w-25 mx-auto d-block "  >
        <h1 class="display-4"><span class="font-weight-bold"> Sistem Informasi Manajemen Karyawan</span></h1>
        <hr class="my-4">
        <p class="font-weight-light h2">SIMKAR</p>
        </div>
    </div>
</div>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $karyawan->where("STATUS", "Active")->count() }}</h3>
                <p>Jumlah Karyawan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="/daftar_karyawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$cuti->count()}}</h3>

                <p>Permohonan Cuti</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/permohonan_cuti" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$gaji->count()}}</h3>

                <p>Dafta Gaji</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="/daftar_gaji" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$jobdesk->count()}}</h3>

                <p>Daftar Jobdesk</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/daftar_jobdesk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
{{-- <div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
            <h3><i class="fas fa-swatchbook"></i></i> DAFTAR RIWAYAT</h3><hr>

            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">level</th>
                    <th scope="col">Aktivitas</th>
                    <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $data)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama}}</td>
                    <td>{{ $data->level}}</td>
                    <td>{{ $data->aktivitas }}</td>
                    <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i a') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@if (auth()->user()->level == "admin")
<script>
    $(function () {
        $("#myTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": true,
            "buttons": [
                {
                extend: 'excel',
                title: 'Daftar Riwayat',
                text: '<i class="fa fa-file-excel "></i>Export Excel',
                className: 'btn btn-default mb-3'




        }]
            }).buttons().remove().container().appendTo('#myTable_wrapper .fluid col-md-6:eq(0)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            //   });
        });
</script>
@endif --}}

@endsection
