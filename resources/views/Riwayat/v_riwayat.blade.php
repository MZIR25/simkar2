@extends('layouts.index')
@section('content')
<div class="row">
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
        'dom': '<"container-fluid"<"row"<"col"Bl><"col"f>>><"bottom"<"container-fluid"t<"row"<"col"i><"col"p>r>>>',
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
