@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12 p-5 pt-2">
        <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-swatchbook"></i></i> DAFTAR USER</h3><hr>

                    <table id="myTable" class="table table-striped table-bordered" >
                    <thead >
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Nama Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Id Karyawan </th>
                        <th colspan="col">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                        @foreach ($users as $u )
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->name}}</td>
                            <td>{{ $u->email}}</td>
                            <td>{{ $u->level}}</td>
                            <td>{{ $u->karyawan_id}}</td>
                            <td>
                                <div class="d-inline">
                                    <a href="/edit_user/{{$u->id}}"><i class="fas fa-edit bg-warning p-2 text-white rounded d-inline" data-toggle="tooltip" title="Edit"></a></i>
                                    <form class="d-inline " action="{{ url('delete_user', $u->id) }} " method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="border-0 shadow-none p-0 d-inline" type="submit">
                                            <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Hapus"></i>
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


@endsection
