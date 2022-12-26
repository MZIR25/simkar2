@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-75" >
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM EDIT USER</b></h4>
            </div>
            <div class="card-body">

<!-- membuat formnya -->
<!-- bagian Nama -->
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <form action={{ url('update_user', $users->id) }} method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$users->name}}" id="name" name="name" class="form-control" placeholder="Masukkan Nama USer">
                            {{-- <x-validate-error-message name="name"/> --}}
                    </div>
                </div>
<!-- bagian Email -->
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email User</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$users->email}}"  id="email" name="email" class="form-control" placeholder="Masukkan Alamat Email">
                            {{-- <x-validate-error-message name="email"/> --}}
                    </div>
                </div>
<!-- bagian level -->
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Level User</label>
                    <div class="col-sm-10">
                        <select name="level" id="level" class="form-control">
                            <option >{{$users->level}}</option>
                            <option >admin</option>
                            <option >karyawan</option>

                    </select>
                </div>

                </div>
<!-- bagian Id Karyawan -->
                <div class="form-group row">
                    <label for="karyawan_id" class="col-sm-2 col-form-label">ID User</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" value="{{$users->karyawan_id}}"  id="karyawan_id" name="karyawan_id" class="form-control" placeholder="Masukkan ID User"> --}}
                        <select name="karyawan_id" id="karyawan_id" class="form-control">
                            @foreach ($karyawan as $k)

                            <option value="{{$k->karyawan_id}}">{{$k->karyawan_id}}.{{$k->Nama_Karyawan}}</option>

                            @endforeach
                        </select>
                        {{-- <x-validate-error-message name="karyawan_id"/> --}}
                        </div>
                </div>
<!-- bagian Siuuuuuuuuu -->
                <div class="form-group row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                    <div>
                </div>
            </form>
            </div>
        </div>
    </div>
  </div>

@endsection
