@extends('layouts.navbar')
@section('isi')
    <section id="editprofile">
        <style type="text/css">
            .col-mt-3 {
                color: black;
            }

            .col-md-12 {
                color: black;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .card {
                border-radius: 10px;
            }

        </style>

        <div class="container">
            <center>
                <div class="animate__animated animate__backInRight">
                    <p class="h2" style="margin-top: 10px">Edit Profile</p>
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="POST" action="/profile/{{ $user->username }}">
                                    @method('put')
                                    @csrf
                                <div class="row">
                                    <div class="row mt-2">
                                        <div class="col-md-12"><label class="labels">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" value="{{ $user->profile->nama }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="no_telp" value="{{ $user->profile->no_telp }}">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Tempat, Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="ttl" value="{{ $user->profile->ttl }}">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Jenis Kelamin</label>
                                        <select type="option" class="form-select" id="jeniskelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin Anda" required>
                                            <option @if($user->profile->jenis_kelamin = "laki-laki") selected @endif>laki-laki</option>
                                            <option @if($user->profile->jenis_kelamin = "perempuan") selected @endif>Perempuan</option>
                                        </select>
                                        <div class="col-md-12"><label class="labels">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="{{ $user->profile->alamat }}">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Usia</label>
                                            <input type="text" class="form-control" name="Usia" value="{{ $user->profile->usia }}">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        </div>
                                        
                                        @can('pengasuh')
                                        
                                        <div class="row "><label class="labels mb-4">Jenis jasa</label>
                                        
                                            <div class="col">
                                        <div class="form-check col-2">
                                            <input class="form-check-input" type="checkbox" name="harian" value='1' id="flexCheckDefault" @if($price->harian) checked @endif>
                                            <label class="form-check-label " for="flexCheckDefault">
                                              Harian
                                            </label>
                                          </div>
                                        </div>

                                        <div class="col">
                                          <div class="form-check col-2">
                                            <input class="form-check-input" type="checkbox" name="mingguan" value='1' id="flexCheckChecked"  @if($price->mingguan) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Mingguan
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="col">
                                          <div class="form-check col-2">
                                            <input class="form-check-input" type="checkbox" name="bulanan" value='1' id="flexCheckChecked"  @if($price->bulanan) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Bulanan
                                            </label>
                                          </div>
                                        </div>

                                        </div>

                                        <div class="col-md-12"><label class="labels">Harga</label>
                                            <input type="text" class="form-control" name="harga" value="{{ $price->harga }}">
                                        </div>
                                        
                                        @endcan

                                        <input type="hidden" value="{{ $user->id }}" name="id">
                                        <div class="mt-2 text-center">
                                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
@endsection
