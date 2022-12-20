@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-md-12 p-5 pt-2">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-swatchbook"></i></i> DAFTAR CUTI</h3>
                    <hr>
                    @if (auth()->user()->karyawan_id)
                        @if (auth()->user()->level == 'karyawan')
                            <a href="{{ route('unggah_cuti') }}" class="btn btn-primary mb-3"><i
                                    class="fas fa-plus-square mr-2"></i>Upload Permohonan</a>
                        @endif
                    @endif
                    {{-- <a href="permohonan_cuti/export_excel" class="btn btn-success mb-3"><i class="fa fa-file-excel mr-2"></i>EXPORT EXCEL</a> --}}
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Karyawan</th>
                                {{-- <th scope="col">Jabatan</th> --}}
                                <th scope="col">Alasan Cuti</th>
                                <th scope="col">Status</th>
                                <th scope="col">Keterangan Status</th>
                                <th scope="col">Tangggal Mulai Cuti</th>
                                <th scope="col">Tangggal Selesai Cuti</th>
                                <th scope="col">Jumlah Hari</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor HP</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuti as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->Karyawan->Nama_Karyawan }}</td>
                                    {{-- <td>
                                @if ($c->Jabatan === null)
                                <span >Tidak Ada Jabatan</span>
                                @else
                                <span>{{ $c->Jabatan->Nama_Jabatan }}</span>
                            @endif
                            </td> --}}
                                    <td>{{ $c->Alasan_Cuti }}</td>
                                    <td>
                                        @if ($c->Status === 'Accept')
                                            <span class="badge badge-success">{{ $c->Status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $c->Status }}</span>
                                        @endif
                                    </td>
                                    {{-- <span class="badge badge-success">{{ $c->Status }}</span></td> --}}
                                    <td>{{ $c->Keterangan_Status }}</td>
                                    <td>{{ $c->Tanggal_Mulai }}</td>
                                    <td>{{ $c->Tanggal_Selesai }}</td>
                                    <td>{{ $c->jumlah_hari }}</td>
                                    <td>{{ $c->Karyawan->Alamat_Karyawan }}</td>
                                    <td>{{ $c->Karyawan->No_Hp }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="/edit_cuti/{{ $c->cuti_id }}"><i
                                                    class="fas fa-edit bg-warning p-2 text-white rounded ml-2 mr-1"
                                                    data-toggle="tooltip" title="Edit"></i></a>
                                            <form id="myForm" action="{{ url('delete_cuti', $c->cuti_id) }} "
                                                method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm mr-1 delete-button" type="submit">
                                                    <i class="fas fa-trash-alt text-white rounded" data-toggle="tooltip"
                                                        title="Hapus"></i></a>
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
    @if (auth()->user()->level == 'admin')
        <script>
            $(function() {
                $("#myTable").DataTable({
                    'dom': '<"container-fluid"<"row"<"col"Bl><"col"f>>><"bottom"<"container-fluid"t<"row"<"col"i><"col"p>r>>>',
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "searching": true,
                    "buttons": [{


                            text: '<i class="fas fa-plus-square mr-2"></i>Upload Permohonan Cuti',
                            className: 'btn btn-success mb-3',
                            action: function(e, dt, button, config) {
                                window.location = '/unggah_cuti';
                            }
                        },
                        {
                            extend: 'excel',
                            title: 'Daftar Permohonan Cuti',
                            text: '<i class="fa fa-file-excel mr-2"></i>Export Excel',
                            className: 'btn btn-default mb-3',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
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
    @if (auth()->user()->level == 'karyawan')
        <script>
            $(function() {
                $("#myTable").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "columnDefs": [{
                        targets: [8, 9, 10],
                        visible: false,
                        searchable: false,
                    }, ]

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
