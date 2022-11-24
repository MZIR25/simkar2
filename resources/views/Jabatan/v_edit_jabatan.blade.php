@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-50">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM EDIT JABATAN</b></h4>
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
            <form action="{{ url('update_jabatan', $jabatan->jabatan_id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
<!-- bagian Jabatan -->
                <div class="form-group row">
                    <label for="Nama_Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$jabatan->Nama_Jabatan}}" id="Nama_Jabatan" name="Nama_Jabatan" class="form-control" placeholder="Masukkan Nama Jabatan">
                            {{-- <x-validate-error-message name="Gaji_Pokok"/> --}}
                    </div>
                </div>
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
