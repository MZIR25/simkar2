@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR CUTI</h3><hr>
                    {{-- <a href="permohonan_cuti/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a> --}}
                    <table id="myTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Keluar</th>
                            <th scope="col">Keterangan</th>
                            <th style="width: 8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensi as $p )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->Karyawan->Nama_Karyawan }}</td>
                            <td>{{ $p->tgl_presensi }}</td>
                            <td>{{ $p->jam_masuk }}</td>
                            <td>{{ $p->jam_keluar }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route("detail_presensi")}}"><i class="fas fa-eye bg-success p-2 text-white rounded ml-2 mr-1" data-toggle="tooltip" title="Edit"></i></a>
                                </div>
                            </td>
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
            'dom': '<"container-fluid"<"row"<"col"Bl><"col"f>>><"bottom"<"container-fluid"t<"row"<"col"i><"col"p>r>>>',
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": true,
            "buttons": [
                {
                extend: 'excel',
                title: 'Riwayat Presensi',
                text: '<i class="fa fa-file-excel mr-2"></i>Export Excel',
                className: 'btn btn-default mb-3',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                }
            }

         ]
         }).buttons().container().appendTo('#myTable_wrapper .fluid col-md-6:eq(0)');
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
@if (auth()->user()->level == "karyawan")
<script>
   $(function () {
    $("#myTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "columnDefs": [
            {
                targets: [9],
                visible: false,
                searchable: false,
            },]

        }).buttons().container().appendTo('#myTable_wrapper .fluid col-md-6:eq(0)');
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
