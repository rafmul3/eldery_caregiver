@extends('layouts.navbar')
@section('isi')

<style type="text/css">
    .nav-item {
        padding-bottom: 10px;
        padding-top: 10px;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    /* .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    } */
</style>

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

<title>List Daftar Pesanan| Elderly Caregiver</title>

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
                <h1 class="pb-3 mb-4 border-bottom">List Daftar Pesanan</h1>
                <div class="card">
                    <h4><div class="card-header text-black text-center">Daftar Pesanan</div></h4>
                    <div class="card-body">
                        <div style="margin:21px;"></div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th class="col-7 text-center">Nama User</th>
                                        <th class="col-2">Status</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- isi table --}}
                                @foreach ($data as $datas)
                                    <tr>
                                        <th >{{ $loop->iteration }}</th>
                                        <td class="text-center ">{{ $datas->user->profile->nama }}</td>

                                            <td><span class="badge rounded-pill bg-primary mt-2">{{ $datas->status }}</span></td>

                                            <td>
                                            {{-- isi tabel selesai --}}
                                            <!-- Button trigger modal konfirmasi -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesai_pengasuh{{ $datas->id }}">
                                                Lihat
                                            </button>

                                            <!-- isi Modal konfirmasi -->
                                            <div class="modal fade" id="selesai_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- <center> --}}
                                                            <h5>Detail Pengasuh</h5>
                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Nama</label>
                                                                <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->pengasuh->profile->nama }}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label " for="ttl">Tanggal Lahir</label>
                                                                <div class="col-4  border-end border-dark">
                                                                    <input type="text" class="form-control-plaintext " id="ttl" value=": {{ $datas->pengasuh->profile->ttl }}" readonly>
                                                                </div>

                                                                <label class=" col-2 col-form-label" for="usia">Usia</label>
                                                                <div class="col-3 ">
                                                                    <input type="text" class="form-control-plaintext" id="usia" value=": {{ $datas->pengasuh->profile->usia }} Tahun" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label " for="alamat">Alamat</label>
                                                                <div class="col-9">
                                                                    <textarea type="text" class="form-control-plaintext" id="alamat" rows="2" readonly> : {{ $datas->pengasuh->profile->alamat}} </textarea>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label " for="no_telp">No.Telepon</label>
                                                                <div class="col-9">
                                                                    <input type="text" class="form-control-plaintext" id="no_telp" rows="2" value=": {{ $datas->pengasuh->profile->no_telp}}" readonly>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <h5>Informasi Tambahan</h5>
                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Tanggal Pesanan</label>
                                                                <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->tanggal }}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Nomor Telpon Darurat</label>
                                                                <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->no_telp_kerabat }}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Riwayat Penyakit</label>
                                                                <div class="col-9 ">
                                                                    <textarea type="text" class="form-control-plaintext" id="nama" readonly>: {{ $datas->penyakit }}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Catatan</label>
                                                                <div class="col-9 ">
                                                                    <textarea type="text" class="form-control-plaintext" id="nama" readonly>: {{ $datas->catatan }}</textarea>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <h5>Detail Harga</h5>
                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Jasa yang Dipilih</label>
                                                                <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->jenis }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Total Harga</label>
                                                                <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->harga }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <label class=" col-3 col-form-label" for="nama">Status Pembayaran</label>
                                                                <div class="col-9 ">
                                                                    <input type="text" class="form-control-plaintext" id="nama" value=": Selesai" readonly>
                                                                </div>
                                                            </div>
                                                            {{-- </form> --}}
                                                            {{-- </center> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($datas->rating > 0)

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nilai_pengasuh{{ $datas->id }}">
                                                Review
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="nilai_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hasil Review</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="d-flex justify-content-center">Hasil penilaian oleh {{ $datas->user->profile->nama }} kepada pengasuh {{ $datas->pengasuh->profile->nama }}</div>
                                                        <form action="order/rating/{{ $datas->id }}" method="post">
                                                            @csrf
                                                        <div class="modal-body d-flex justify-content-center">

                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="rate{{ $datas->id }}" value="5" disabled @if ($datas->rating > 4) checked @endif>
                                                            <label for="star5" title="Sangat Baik">5 stars</label>
                                                            <input type="radio" id="star4" name="rate{{ $datas->id }}" value="4" disabled @if ($datas->rating < 5) checked @endif>
                                                            <label for="star4" title="Baik">4 stars</label>
                                                            <input type="radio" id="star3" name="rate{{ $datas->id }}" value="3" disabled @if ($datas->rating < 4) checked @endif>
                                                            <label for="star3" title="Oke">3 stars</label>
                                                            <input type="radio" id="star2" name="rate{{ $datas->id }}" value="2" disabled @if ($datas->rating < 3) checked @endif>
                                                            <label for="star2" title="Buruk">2 stars</label>
                                                            <input type="radio" id="star1" name="rate{{ $datas->id }}" value="1" disabled @if ($datas->rating < 2) checked @endif>
                                                            <label for="star1" title="Sangat Buruk">1 star</label>
                                                        </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif


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
