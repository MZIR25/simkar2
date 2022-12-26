@extends('layouts.index')


@section('content')

<div class="col-md-12 p-5 pt-2">

    <!-- membuat form -->
    <div class="container w-75">
        <div class="card mt-2">
            <div class="card-header ">
              <h4 style="text-align:center"><b>FORM REKAP CUTI</b></h4>
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
            <form action="{{route("rekap_presensi")}}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date-own" id="star_date" name="star_date" class="form-control"/>
                            {{-- <x-validate-error-message name="Tanggal_Mulai"/> --}}
                        </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date-own" id="end_date" name="end_date" class="form-control"/>
                            {{-- <x-validate-error-message name="Tanggal_Selesai"/> --}}
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
  <script>
    $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
    </script>

@endsection
