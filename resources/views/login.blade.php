@extends('layouts.navbar')

@section('isi')
<style type="text/css">

form{
    background: #fff;
    padding: 40px;
    color: black;
    border-radius: 10px;
    margin-top: 140px;
    align-content: center;
}

</style>

<title>{{ $head }}</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="animate__animated animate__backInLeft col-5 pt-3">

            <form class="pt-5" action="/login" method="post">
                @csrf

                @if (session('login'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('login') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h3 class="pt-2">Login to Elderly Caregiver</h3>
                <p>Kebahagiaanmu dimulai dari sini</p><hr>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" required value={{ old('email') }}>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" required>
                </div>
                <center><div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <p>Belum Punya Akun? Register sebagai <a class="link-primary" href="/regisuser">User </a> atau <a class="link-primary" href="/regispengasuh">Pengasuh </a></p></center>
            </form>
        </div>
    <div class="animate__animated animate__backInRight  col-4 pt-6">
        <img src="https://drive.google.com/uc?export=view&id=1-60_Cdoeg-BezVa3Vd2qW5_BBwERylfc" alt="" width="600px" height="600px" style= "Margin-left: 5px; Margin-top: 115px">
    </div>
</div>
@endsection
