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

    <section id="profile">
        <style type="text/css">
        .card {
            border-radius: 10px
        }
        </style>
        <title>Home Pengasuh | Elderly Caregiver</title>
        <div class="container">
            <center>
                <div class="animate__animated animate__backInRight">
                    <p class="h2" style="margin-top: 10px ">Profile</p>
                    <div class="col-md-4 mb-4" style="margin-top: 10px">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('storage/' . $user->profile->foto) }}" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="col-sm-15">

                                        <button type="button" class="btn btn-success" style="margin-top: 20px" data-bs-toggle="modal" data-bs-target="#id{{ $user->id }}">
                                            Change Profile Picture
                                        </button>
                                    </div>
                                    <div class="mt-3">
                                        <h4 style="color: black">{{ $user->username }}</h4>
                                        <p class="text-muted font-size-sm">{{ $user->status }}</p>
                                        <p class="text-muted font-size-sm">Rating</p>
                                        
                                        @if (is_null($user->profile->rating))
                                            <p class="text-muted font-size-sm">Belum ada Rating</p>
                                            @else
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5" disabled @if ($user->profile->rating > 4) checked @endif>
                                                <label for="star5" title="Sangat Baik">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4" disabled @if ($user->profile->rating < 5) checked @endif>
                                                <label for="star4" title="Baik">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3" disabled @if ($user->profile->rating < 4) checked @endif>
                                                <label for="star3" title="Oke">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2" disabled @if ($user->profile->rating < 3) checked @endif>
                                                <label for="star2" title="Buruk">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1" disabled @if ($user->profile->rating < 2) checked @endif>
                                                <label for="star1" title="Sangat Buruk">1 star</label>
                                            </div>
                                        @endif



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="color: black">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->profile->nama }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="color: black">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="color: black">
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3" style="color: black">
                                        <h6 class="mb-0" style="color: black">Nomor Telepon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="color: black">
                                        {{ $user->profile->no_telp }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3" style="color: black">
                                        <h6 class="mb-0">Usia</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="color: black">
                                        {{ $user->profile->usia }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3" style="color: black">
                                        <h6 class="mb-2">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="color: black">
                                        {{ $user->profile->alamat }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-15">
                                        <a class="btn btn-success " href="/profile/{{ $user->username }}/edit">Edit Profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <hr size="4px" width="90%"> --}}
            </center>
        </div>
    </section>
    {{-- Modal --}}
        <div class="modal fade" id="id{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form method="POST" action="/profile/{{ $user->username }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                            @error('ktp')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                    @enderror
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="hidden" value="{{ $user->id }}" name="id">
                  <button type="submit" class="btn btn-primary">Konfirmasi</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    {{-- endmodal --}}
    @can('pengasuh')
    <section id="daftarlansia" class="mb-5">
        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th {
                border: 1px solid #ffffff;
                text-align: center;
                padding: 10px;
                color: #ffffff;
                background-color: #22577A
            }

            td {
                color: #ffffff;
                border: 1px solid #ffffff;
                text-align: center;
                padding: 8px;
            }

        </style>
        {{-- <div class="containter">
            <div class="animate__animated animate__backInRight">
                <center>
                    <p class="h3" style="margin-top: 10px;">Daftar Lansia</p>
                    <table class="col-md-11 mb-11 text-center">
                        <tr>
                            <th>Nama Lansia</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Terverifikasi</td>
                            <td> <a class="btn btn-success " target="__blank">Detail</a> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Selesai</td>
                            <td><a class="btn btn-success center" target="__blank">Detail</a> </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div> --}}
    </section>
@endcan
@endsection
