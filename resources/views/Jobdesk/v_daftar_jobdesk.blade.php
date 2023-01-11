@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR JOBDESK</h3><hr>
                {{-- @if (auth()->user()->level == "admin")
                    <a href="{{ route('unggah_jobdesk') }}" class="btn btn-primary mb-3 " ><i class="fas fa-plus-square mr-2"></i>Upload Jobdesk</a>
                @endif --}}
                    {{-- <a href="daftar_jobdesk/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a> --}}
                    <table id="myTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Tugas Karyawan</th>
                        <th style="width: 9%">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($jobdesk as $j )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $j->Karyawan->Nama_Karyawan }}</td>
                            <td>
                                @if ($j->Jabatan === null )
                                <span >Tidak Ada Jabatan</span>
                                @else
                                <span>{{ $j->Jabatan->Nama_Jabatan }}</span>
                                @endif
                            </td>
                            <td>{{ $j->Tugas_Karyawans }}</td>
                            <td>

                            <div class="row">
                                <a href="/edit_jobdesk/{{$j->jobdesk_id}}"><i class="fas fa-edit bg-warning p-2 text-white rounded ml-2 mr-1"
                                    data-toggle="tooltip" title="Edit"></a></i>
                                <form class="d-inline " id="myForm" action="{{ url('delete_jobdesk', $j->jobdesk_id) }} "
                                    method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm mr-1 delete-button" type="submit">
                                        <i class="fas fa-trash-alt text-white rounded" data-toggle="tooltip" title="Hapus"></i>
                                    </button>
                                </form>
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


                text: '<i class="fas fa-plus-square mr-2"></i>Upload Jobdesk',
                className: 'btn btn-success mb-3',
                action: function ( e, dt, button, config ) {
                window.location = '/unggah_jobdesk';
                }
            },
                {
                extend: 'excel',
                title: 'Daftar Jobdeks',
                text: '<i class="fa fa-file-excel mr-2"></i>Export Excel',
                className: 'btn btn-default mb-3',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
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
                targets: [4],
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
<script>
    document.querySelectorAll(".delete-button").forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            let form = item.closest("form");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        })
    })
</script>
@endsection
