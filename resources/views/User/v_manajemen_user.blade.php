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
                                <div class="row">
                                    <a href="/edit_user/{{$u->id}}"><i class="fas fa-edit bg-warning p-2 text-white rounded ml-2 mr-1" data-toggle="tooltip" title="Edit"></i></a>
                                    <form id="myForm" action="{{ url('delete_user', $u->id) }} " method="POST">
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


@endsection
