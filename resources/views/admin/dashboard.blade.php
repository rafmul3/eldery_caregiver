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

<title>Dashboard | Elderly Caregiver</title>

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
                <h1 class="pb-3 mb-0 border-bottom">Dashboard</h1>
                <div class="card-body">
                    <div style="margin:21px;"></div>
                    <div class="card">
                        <div class="card-body">
                        <center>
                        <div class="col-sm-9">
                            <div style="margin:21px;"></div>
                            <div class="col-sm-11 mx-auto">
                                <div class ='h4 text-dark border-bottom pb-2'>Jumlah Pengguna</div>
                                <div class="row row-cols-lg-2 row-cols-sm-1 mt-5">
                                    <div class="col-xl-6 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2 bg-success">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="h3 font-weight-bold text-light text-uppercase mb-2">Jumlah Pengasuh</div>
                                                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $pengasuh }}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-child fa-4x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="h3 font-weight-bold text-light text-uppercase mb-2">Jumlah User</div>
                                                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $pengguna }}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-users fa-4x text-gray-300"></i>
                                                    </div>
                                                    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </center>

                                {{-- <div class="card"> --}}
                                    <div class ='h4 text-dark border-bottom pt-3 pb-2 text-center'>List Artikel</div>
                                    <a class="btn btn-success col-md-2 mt-4" href="/homeartikel" role="button">Buat Artikel Baru</a>
                                    <div class="card-body">
                                        <div style="margin:21px;"></div>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Judul Artikel</th>
                                                        <th scope="col">Pengarang</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($datas as $key=>$value)
                                                    <tr>
                                                        <th scope="row">{{ $datas->firstItem() + $loop->index }}</th>
                                                        <td>{{ $value->judul }}</td>
                                                        <td>{{ $value->pengarang }}</td>
                                                        <td><a href="{{ url('/artikel/edit/'.$value->id) }}" class="btn btn-success m-2">Edit</a>
                                                        <a href="{{ url('/artikel/hapus/'.$value->id) }}" class="btn btn-danger">Hapus</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex justify-content-center m-3">
                                                {{ $datas->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
