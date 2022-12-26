@extends('layouts.app')

@section('content')

<div class="container-fluid p-5 m-">
    <div class="container">
        <div class="text-center">
        <img src="{{asset('template/')}}/dist/img/logo_valtech1.png"  alt="Valtech Logo" class="rounded w-25 mx-auto d-block "  >
        <h1 class="display-4"><span class="font-weight-bold"> Sistem Informasi Manajemen Karyawan</span></h1>
        <hr class="my-4">
        <p class="font-weight-light h2">SIMKAR</p>
        @if (auth()->user() && auth()->user()->level == null)
            <div>Akun belum di acc, silahkan menunggu admin</div>
        @endif
        </div>
    </div>
</div>
@endsection
