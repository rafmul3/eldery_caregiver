@extends('layouts.navbar')

@section('isi')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="text-center">
     {{ session('status') }}
    </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<style type="text/css">
    .nav-item{
        padding-bottom: 10px;
        padding-top: 10px;
    }

</style>

<title>List User| Elderly Caregiver</title>

<main>
    <div class="row g-0">
        <div class="col-sm-2 border-end bg-light d-md-block collapse" style="min-height: 100vh" id="sidebarMenu">
            <div class="d-flex sticky-top">
            <div class="container-fluid">
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom">
                        <a class="nav-link active  text-black" aria-current="page" href="/dashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link text-black" href="/detailpesan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            Pesanan
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link text-black" href="/listpengasuh">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            List Pengasuh
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link text-black" href="/listuser">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            List User
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div style="margin:21px;"></div>
            <div class="col-sm-11 mx-auto">
                <h1 class="pb-3 mb-4 border-bottom">List User</h1>
                <div class="card">
                    <h4><div class="card-header text-black text-center">Daftar Akun</div></h4>
                    <div class="card-body">
                        <div style="margin:21px;"></div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="col text-center">Nama User</th>
                                            <th class="col-2">Status</th>
                                            <th class="col-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- isi table --}}
                                    @foreach ($data as $datas)
                                        <tr>
                                            <th >{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $datas->profile->nama}}</td>
                                            @if($datas->status == 'user')
                                            <td><span class="badge rounded-pill bg-primary mt-2">{{ $datas->status }}</span></td>
                                            @else
                                            <td><span class="badge rounded-pill bg-warning text-dark mt-2">{{ $datas->status }}</span></td>
                                            @endif
                                            <td>
                                                <!-- Button trigger modal lihat -->

                                                <a href="/detailuser/{{ $datas->username }}" class="btn btn-success" >
                                                    Lihat
                                                    {{-- ini filenya ada di detailuserpengasuh.blade.php buat yg pengasuh sama di detailuser.blade.php buat user/lansia --}}
                                                </a>

                                            <!-- Button trigger modal hapus-->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $datas->id }}">
                                                    Hapus
                                                </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus user?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                                    <form method="POST" action="/pelamar/deleted">
                                                        @csrf
                                                        <input type="hidden" value="{{ $datas->id }}" name="id">
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </form>

                                                </div>
                                                </div>
                                                </div>
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
            </div>
        </div>
</main>
@endsection
