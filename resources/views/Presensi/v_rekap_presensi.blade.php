@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i>Daftar Rekap Presensi</h3><hr>
                    <a href="" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Rekap Presensi</a>
                    <table id="myTable" class="table table-striped table-bordered" >
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Status</th>
                            <th style="width: 8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="row">
                                    <a href=""><i class="fas fa-eye bg-success p-2 text-white rounded ml-2 mr-1" data-toggle="tooltip" title="Edit"></i></a>
                                </div>
                            </td>
                        </tr>

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
            "buttons": false,
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
@endif
@endsection
