@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card mx-auto w-50">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR JABATAN</h3><hr>
                {{-- @if (auth()->user()->level == "admin")
                    <a href="{{ route('unggah_gaji') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Upload Gaji</a>
                @endif --}}
                    {{-- <a href="daftar_gaji/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a> --}}
                    <table id="myTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Devisi</th>
                        <th style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devisi as $d )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->Nama_Devisi}}</td>
                            <td>
                                <a href="/edit_devisi/{{$d->devisi_id}}"><i class="d-inline fas fa-edit bg-warning p-2 text-white rounded " data-toggle="tooltip" title="Edit"></a></i>
                                <form class="d-inline " action="{{ url('delete_devisi', $d->devisi_id) }} " method="POST">
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


                text: '<i class="fas fa-plus-square mr-2"></i>Upload Devisi',
                className: 'btn btn-success mb-3',

                action: function ( e, dt, button, config ) {
                window.location = '/unggah_devisi';
                }
            },

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
{{-- @if (auth()->user()->level == "karyawan")
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
@endif --}}
@endsection
