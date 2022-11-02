@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR GAJI</h3><hr>
                {{-- @if (auth()->user()->level == "admin")
                    <a href="{{ route('unggah_gaji') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Gaji</a>
                @endif --}}
                    {{-- <a href="daftar_gaji/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a> --}}
                    <table id="myTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Gaji Pokok</th>
                        <th scope="col">Status Pernikahan</th>
                        <th scope="col">Pajak Bpjs</th>
                        <th scope="col">Jumlah Gaji</th>
                        <th style="width: 9%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gaji as $g )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->Karyawan->Nama_Karyawan }}</td>
                            <td>{{ $g->Karyawan->Jabatan->Nama_Jabatan }}</td>
                            <td>{{ $g->Gaji_Pokok }}</td>
                            <td>{{ $g->Karyawan->Status_Pernikahan }}</td>
                            <td>{{ $g->Pajak_Bpjs }}</td>
                            <td>{{ $g->Jumlah_Gaji }}</td>
                            <td>

                                <a href="/edit_gaji/{{$g->gaji_id}}"><i class="d-inline fas fa-edit bg-warning p-2 text-white rounded " data-toggle="tooltip" title="Edit"></a></i>
                                <form class="d-inline " action="{{ url('delete_gaji', $g->gaji_id) }} " method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="border-0 shadow-none p-0 d-inline" type="submit">
                                        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Hapus"></i>
                                    </button>
                                </form>

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


                text: '<i class="fas fa-plus-square mr-2"></i>Upload Gaji',
                className: 'btn btn-success mb-3',

                action: function ( e, dt, button, config ) {
                window.location = '/unggah_gaji';
                }
            },
                {
                extend: 'excel',
                title: 'Daftar Gaji',
                text: '<i class="fa fa-file-excel mr-2"></i>Export Excel',
                className: 'btn btn-default mb-3',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                }
            }

         ]
         }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
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
                targets: [7],
                visible: false,
                searchable: false,
            },]

        }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
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
