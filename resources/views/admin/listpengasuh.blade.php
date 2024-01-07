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

<title>List Pengasuh| Elderly Caregiver</title>

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
                <h1 class="pb-3 mb-4 border-bottom">List Konfirmasi Pengasuh</h1>
                <div class="card">
                    <h4><div class="card-header text-black text-center">Daftar Pengasuh</div></h4>
                    <div class="card-body">
                        <div style="margin:21px;"></div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th class="col text-center">Nama Pengasuh</th>
                                        <th class="col-2">Jenis_kelamin</th>
                                        <th class="col-3">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- isi table --}}
                                @foreach ($data as $datas)
                                    <tr>
                                        <th >{{ $loop->iteration }}</th>
                                        <td class="text-center">{{ $datas->profile->nama}}</td>
                                        <td>{{ $datas->profile->jenis_kelamin }}</td>
                                        <td>
                                            {{-- isi tabel selesai --}}


                                            <!-- Button trigger modal konfirmasi -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#id{{ $datas->id }}">
                                                Konfirmasi
                                            </button>

                                            <!-- isi Modal konfirmasi -->
                                            <div class="modal fade" id="id{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengasuh</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            {{-- <center> --}}

                                                                <div class="row mt-2">
                                                                    <label class=" col-3 col-form-label" for="nama">Nama</label>
                                                                    <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->profile->nama }}" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <label class=" col-3 col-form-label " for="ttl">Tanggal Lahir</label>
                                                                    <div class="col-4  border-end border-dark">
                                                                    <input type="text" class="form-control-plaintext " id="ttl" value=": {{ $datas->profile->ttl }}" readonly>
                                                                    </div>

                                                                    <label class=" col-2 col-form-label" for="usia">Usia</label>
                                                                    <div class="col-3 ">
                                                                    <input type="text" class="form-control-plaintext" id="usia" value=": {{ $datas->profile->usia }} Tahun" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <label class=" col-3 col-form-label " for="alamat">Alamat</label>
                                                                    <div class="col-9">
                                                                    <textarea type="text" class="form-control-plaintext" id="alamat" rows="2" readonly> : {{ $datas->profile->alamat}} </textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2 border-bottom border-dark">
                                                                    <label class=" col-3 col-form-label " for="no_telp">No.Telepon</label>
                                                                    <div class="col-9">
                                                                    <input type="text" class="form-control-plaintext" id="no_telp" rows="2" value=": {{ $datas->profile->no_telp}}" readonly>
                                                                    </div>
                                                                </div>

                                                                <form action="/download" method="post" enctype="">
                                                                    @csrf
                                                                <div class="row mt-4">
                                                                    <label class=" col-2 col-form-label" for="ktp">KTP</label>
                                                                    <div class="col-3">
                                                                        <input type="hidden" value="{{ $datas->profile->ktp }}" name="cv">
                                                                        <button type="submit" class="btn btn-primary"> Download</button>
                                                                    </div>
                                                                </div>
                                                                </form>

                                                                <form action="/download" method="post" enctype="">
                                                                    @csrf
                                                                <div class="row mt-4">
                                                                    <label class=" col-2 col-form-label " for="CV">CV</label>
                                                                    <div class="col-3">
                                                                    <input type="hidden" value="{{ $datas->profile->cv }}" name="cv">
                                                                        <button type="submit" class="btn btn-primary"> Download</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                        {{-- </form> --}}
                                                            {{-- </center> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="/pelamar/konfirmasi" method="post" enctype="">
                                                        @csrf
                                                        <input type="hidden" value="{{ $datas->id}}" name="id">
                                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                                    </form>

                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            {{-- modal konfirmasi selesai --}}

                                            <!-- Button trigger modal tolak -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolak{{ $datas->id }}" data-bs-whatever="@mdo">Tolak</button>
                                            <div class="modal fade" id="tolak{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Form Penolakan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                                      </svg></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <div class="mb-3">
                                                        <textarea class="form-control form-control-plaintext" id="message-text">Apakah anda yakin ingin menolak pelamar dengan nama {{ $datas->profile->nama }}?</textarea>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form method="POST" action="/pelamar/deleted">
                                                        @csrf
                                                        <input type="hidden" value="{{ $datas->id }}" name="id">
                                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            {{-- modal tolak selesai --}}
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
    </div>
</main>
@endsection
