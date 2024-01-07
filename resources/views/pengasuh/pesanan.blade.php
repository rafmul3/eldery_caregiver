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

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .nav-item2 {
        padding-bottom: 10px;
        padding-top: 10px;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .rate2 {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate2:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate2:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate2:not(:checked)>label:before {
        content: '★ ';
    }

    .rate2>input:checked~label {
        color: #ffc700;
    }

    /* .rate2:not(:checked)>label:hover,
    .rate2:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate2>input:checked+label:hover,
    .rate2>input:checked+label:hover~label,
    .rate2>input:checked~label:hover,
    .rate2>input:checked~label:hover~label,
    .rate2>label:hover~input:checked~label {
        color: #c59b08;
    } */
</style>

<title>List Pesanan| Elderly Caregiver</title>
<center>
    <div class="col-sm-10">
        <div style="margin:21px;"></div>
        <div class="col-sm-11 mx-auto">
            <h1 class="pb-3 mb-4 border-bottom">List Pesanan</h1>
            <div class="card">
                <h4>
                    <div class="card-header text-black text-center">Daftar Pesanan</div>
                </h4>
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
                                <tr>
                                    @can('pengasuh')
                                    @foreach ($pesanan_pengasuh as $datas)
                                    <th>{{ $loop->iteration }}</th>
                                    <td class="text-center ">{{ $datas->user->profile->nama }}</td>
                                    @if ($datas->status == 'Request')
                                    <td><span class="badge rounded-pill bg-secondary mt-2">{{ $datas->status }}</span></td>
                                    @elseif ($datas->status == 'Prosess')
                                    <td><span class="badge rounded-pill bg-success mt-2">{{ $datas->status }}</span></td>
                                    @elseif ($datas->status == 'Menunggu Konfirmasi Pembayaran')
                                    <td><span class="badge rounded-pill bg-warning text-dark mt-2">{{ $datas->status }}</span></td>
                                    @elseif ($datas->status == 'Selesai')
                                    <td><span class="badge rounded-pill bg-primary mt-2">{{ $datas->status }}</span></td>
                                    @elseif ($datas->status == 'Ditolak')
                                    <td><span class="badge rounded-pill bg-danger mt-2">{{ $datas->status }}</span></td>
                                    @else
                                    <td>{{ $datas->status }}</td>
                                    @endif
                                    <td>

                                        @if ($datas->status == 'Menunggu Konfirmasi Pembayaran')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasi_pengasuh{{ $datas->id }}">
                                            Konfirmasi
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="konfirmasi_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Cara konfirmasi : Silahkan tekan tombol konfirmasi ketika telah menerima pembayaran dari user
                                                        @if ($datas->bukti_bayar)
                                                        <br>
                                                        <br> Bukti Bayar :
                                                        <img src="{{ asset('bukti_bayar/'.$datas->bukti_bayar) }}" alt="" class="img-preview img-fluid ms-5 col-sm-5 d-block">
                                                        @endif
                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Total Harga</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->harga }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <form action="order/{{$datas->id}}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" value="Selesai" name="status">
                                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Konfirmasi</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @elseif($datas->status == 'Prosess')

                                        <!-- Button trigger modal konfirmasi -->
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#proses_pengasuh{{ $datas->id }}">
                                            Lihat
                                        </button>

                                        <!-- isi Modal konfirmasi -->
                                        <div class="modal fade" id="proses_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                        @elseif($datas->status == 'Selesai')
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

                                        <!-- Button trigger modal -->
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
                                                    <div class="d-flex justify-content-center">Hasil penilaian oleh {{ $datas->user->profile->nama }} </div>
                                                    <form action="order/rating/{{ $datas->id }}" method="post">
                                                        @csrf
                                                    <div class="modal-body d-flex justify-content-center">

                                                    <div class="rate2">
                                                        <input type="radio" id="star5" name="rate2{{ $datas->id }}" value="5" disabled @if ($datas->rating > 4) checked @endif>
                                                        <label for="star5" title="Sangat Baik">5 stars</label>
                                                        <input type="radio" id="star4" name="rate2{{ $datas->id }}" value="4" disabled @if ($datas->rating < 5) checked @endif>
                                                        <label for="star4" title="Baik">4 stars</label>
                                                        <input type="radio" id="star3" name="rate2{{ $datas->id }}" value="3" disabled @if ($datas->rating < 4) checked @endif>
                                                        <label for="star3" title="Oke">3 stars</label>
                                                        <input type="radio" id="star2" name="rate2{{ $datas->id }}" value="2" disabled @if ($datas->rating < 3) checked @endif>
                                                        <label for="star2" title="Buruk">2 stars</label>
                                                        <input type="radio" id="star1" name="rate2{{ $datas->id }}" value="1" disabled @if ($datas->rating < 2) checked @endif>
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

                                        @elseif($datas->status == 'Ditolak')
                                        <!-- Button trigger modal konfirmasi -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak_pengasuh{{ $datas->id }}">
                                            Lihat
                                        </button>

                                        <!-- isi Modal konfirmasi -->
                                        <div class="modal fade" id="ditolak_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        {{-- </form> --}}
                                                        {{-- </center> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @else

                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detail_pengasuh{{ $datas->id }}">
                                            Lihat
                                        </button>

                                        <!-- Button trigger modal konfirmasi -->


                                        <!-- isi Modal konfirmasi -->
                                        <div class="modal fade" id="detail_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <center> --}}
                                                        <h5>Detail Lansia</h5>
                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Nama Lansia</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->user->profile->nama }}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Jenis Kelamin</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->user->profile->jenis_kelamin }}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label " for="ttl">Tanggal Lahir</label>
                                                            <div class="col-4  border-end border-dark">
                                                                <input type="text" class="form-control-plaintext " id="ttl" value=": {{ $datas->user->profile->ttl }} " readonly>
                                                            </div>

                                                            <label class=" col-2 col-form-label" for="usia">Usia</label>
                                                            <div class="col-3 ">
                                                                <input type="text" class="form-control-plaintext" id="usia" value=":  {{ $datas->user->profile->usia }}Tahun" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label " for="alamat">Alamat</label>
                                                            <div class="col-9">
                                                                <textarea type="text" class="form-control-plaintext" id="alamat" rows="2" readonly> : {{ $datas->user->profile->alamat }}  </textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label " for="no_telp">No.Telepon</label>
                                                            <div class="col-9">
                                                                <input type="text" class="form-control-plaintext" id="no_telp" rows="2" value=": {{ $datas->user->profile->no_telp }}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Email</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->user->email }}" readonly>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h5>Informasi Tambahan</h5>
                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Tanggal Kerja</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->tanggal }} " readonly>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Nomor Telpon Darurat</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->no_telp_kerabat}}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Riwayat Penyakit</label>
                                                            <div class="col-9 ">
                                                                <textarea type="text" class="form-control-plaintext" id="nama" readonly>: {{ $datas->penyakit}}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Catatan</label>
                                                            <div class="col-9 ">
                                                                <textarea type="text" class="form-control-plaintext" id="nama" readonly>: {{ $datas->catatan}}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h5>Detail Harga</h5>
                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Jasa yang Dipilih</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->jenis}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <label class=" col-3 col-form-label" for="nama">Total Harga</label>
                                                            <div class="col-9 ">
                                                                <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->harga}}" readonly>
                                                            </div>
                                                        </div>
                                                        {{-- </form> --}}
                                                        {{-- </center> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="row">
                                                            <div class="col-5"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>
                                                            <div class="col-7">
                                                                <form action="order/{{$datas->id}}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" value="Prosess" name="status">
                                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Konfirmasi</button>
                                                            </div>
                                                            </form>


                                                        </div>
                                                    </div>






                                                </div>
                                            </div>
                                        </div>
                        </div>
                        {{-- modal konfirmasi selesai --}}

                        <!-- Button trigger modal hapus-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batal_pengasuh{{ $datas->id }}">
                            Tolak
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="batal_pengasuh{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin Ingin Menolak Pesanan?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                        <form method="POST" action="order/{{ $datas->id }}">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" value="Ditolak" name="status">
                                            <button type="submit" class="btn btn-primary">Tolak</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        </td>
                        </tr>
                        @endforeach
                        @endcan

                        @can('user')
                        @foreach ($pesanan_user as $datas)
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $datas->pengasuh->profile->nama }}</td>
                        @if ($datas->status == 'Request')
                        <td><span class="badge rounded-pill bg-secondary mt-2">{{ $datas->status }}</span></td>
                        @elseif ($datas->status == 'Prosess')
                        <td><span class="badge rounded-pill bg-success mt-2">{{ $datas->status }}</span></td>
                        @elseif ($datas->status == 'Menunggu Konfirmasi Pembayaran')
                        <td><span class="badge rounded-pill bg-warning text-dark mt-2">{{ $datas->status }}</span></td>
                        @elseif ($datas->status == 'Selesai')
                        <td><span class="badge rounded-pill bg-primary mt-2">{{ $datas->status }}</span></td>
                        @elseif ($datas->status == 'Ditolak')
                        <td><span class="badge rounded-pill bg-danger mt-2">{{ $datas->status }}</span></td>
                        @else
                        <td>{{ $datas->status }}</td>
                        @endif
                        <td>

                            @if ($datas->status == 'Prosess')
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#abc{{ $datas->id }}">
                                Bayar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="abc{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Cara pembayaran : silahkan melakukan transaksi secara langsung atau melalui bukti bayar kepada pengasuh, dan tunggu konfirmasi pembayaran dari pihak pengasuh
                                            <div class="mb-3">
                                            <form action="order/{{$datas->id}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                            <label for="formFileSm" class="form-label mt-3">Masukan bukti bayar</label>
                                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="bukti_bayar">
                                            </div>
                                            <div class="row mt-2">
                                                <label class=" col-3 col-form-label" for="nama">Total Harga</label>
                                                <div class="col-9 ">
                                                    <input type="text" class="form-control-plaintext" id="nama" value=": {{ $datas->harga }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <div class="row">
                                                <div class="col-7">

                                                        <input type="hidden" value="Menunggu Konfirmasi Pembayaran" name="status">
                                                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Bayar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif($datas->status == 'Menunggu Konfirmasi Pembayaran')
                            <!-- Button trigger modal -->
                            <!-- Button trigger modal konfirmasi -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#user_bayar{{ $datas->id }}">
                                Lihat
                            </button>

                            <!-- isi Modal konfirmasi -->
                            <div class="modal fade" id="user_bayar{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text" class="form-control-plaintext" id="nama" value=": Menunggu Konfirmasi" readonly>
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

                            @elseif($datas->status == 'Selesai')
                            <!-- Button trigger modal konfirmasi -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#finish_user{{ $datas->id }}">
                                Lihat
                            </button>

                            <!-- isi Modal konfirmasi -->
                            <div class="modal fade" id="finish_user{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <!-- Button trigger modal -->
                            @if (is_null($datas->rating))

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nilai_user{{  $datas->id }}">
                                Nilai
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="nilai_user{{  $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Review Pengasuh</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="d-flex justify-content-center">Seberapa puas kamu terhadap {{ $datas->pengasuh->profile->nama }} </div>
                                        <form action="order/rating/{{ $datas->id }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $datas->pengasuh->profile->user_id }}" name="pengasuh_id">
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="rate">
                                                <input type="radio" id="star5{{  $datas->id }}" name="rate" value="5">
                                                <label for="star5{{  $datas->id }}" title="Sangat Baik">5 stars</label>
                                                <input type="radio" id="star4{{  $datas->id }}" name="rate" value="4">
                                                <label for="star4{{  $datas->id }}" title="Baik">4 stars</label>
                                                <input type="radio" id="star3{{  $datas->id }}" name="rate" value="3">
                                                <label for="star3{{  $datas->id }}" title="Oke">3 stars</label>
                                                <input type="radio" id="star2{{  $datas->id }}" name="rate" value="2">
                                                <label for="star2{{  $datas->id }}" title="Buruk">2 stars</label>
                                                <input type="radio" id="star1{{  $datas->id }}" name="rate" value="1" required>
                                                <label for="star1{{  $datas->id }}" title="Sangat Buruk">1 star</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit Rating</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#review_user{{ $datas->id }}">
                                Review
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="review_user{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hasil Review</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="d-flex justify-content-center">Hasil penilaian Anda kepada pengasuh {{ $datas->pengasuh->profile->nama }} </div>
                                        <form action="order/rating/{{ $datas->id }}" method="post">
                                            @csrf
                                        <div class="modal-body d-flex justify-content-center">

                                        <div class="rate2">
                                            <input type="radio" id="star5" name="rate2{{ $datas->id }}" value="5" disabled @if ($datas->rating > 4) checked @endif>
                                            <label for="star5" title="Sangat Baik">5 stars</label>
                                            <input type="radio" id="star4" name="rate2{{ $datas->id }}" value="4" disabled @if ($datas->rating < 5) checked @endif>
                                            <label for="star4" title="Baik">4 stars</label>
                                            <input type="radio" id="star3" name="rate2{{ $datas->id }}" value="3" disabled @if ($datas->rating < 4) checked @endif>
                                            <label for="star3" title="Oke">3 stars</label>
                                            <input type="radio" id="star2" name="rate2{{ $datas->id }}" value="2" disabled @if ($datas->rating < 3) checked @endif>
                                            <label for="star2" title="Buruk">2 stars</label>
                                            <input type="radio" id="star1" name="rate2{{ $datas->id }}" value="1" disabled @if ($datas->rating < 2) checked @endif>
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

                            @elseif($datas->status == 'Ditolak')
                            <!-- Button trigger modal konfirmasi -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolak_user{{ $datas->id }}">
                                Lihat
                            </button>

                            <!-- isi Modal konfirmasi -->
                            <div class="modal fade" id="tolak_user{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            {{-- </form> --}}
                                            {{-- </center> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @else
                            <!-- Button trigger modal konfirmasi -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#id{{ $datas->id }}">
                                Lihat
                            </button>

                            <!-- isi Modal konfirmasi -->
                            <div class="modal fade" id="id{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            {{-- </form> --}}
                                            {{-- </center> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal konfirmasi selesai --}}

                            <!-- Button trigger modal hapus-->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batal_user{{ $datas->id }}">
                                Batal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="batal_user{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Membatalkan Pesanan?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>

                                            <form method="POST" action="order/{{ $datas->id }}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="" name="id">
                                                <button type="submit" class="btn btn-primary">Batalkan</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                        @endcan


                        <tbody>
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</center>
@endsection
