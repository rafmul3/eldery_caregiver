@extends('layouts.navbar')

@section('isi')

    <section id="artikel">
        <style id="text/css">
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
            <form action="/postingartikel" method="post" enctype="multipart/form-data">
                @csrf
                <div class="animate__animated animate__backInRight">
                    <p class="h2" style="margin-top: 10px">Buat Artikel Baru</p>
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row mt-2">
                                        <div class="col-mt-3"><label class="labels">Pengarang</label><input
                                                type="text" class="form-control" placeholder="Nama Pengarang" name="pengarang" required value={{ old('pengarang') }}>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Gambar
                                                Artikel</label><input type="file" class="form-control"
                                                placeholder="Change Profile Picture" name="gambarArtikel" required value="">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Judul
                                                Artikel</label><input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                placeholder="Judul Artikel" name="judul" required value={{ old('judul') }}>
                                                @error('judul')
                                                    <div class="invalid-feedback">
                                                    {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                                
                                        <div class="col-md-12"><label class="labels">Caption Artikel</label>
                                            <textarea class="form-control" placeholder="Caption" name="deskripsi" required value={{ old('deskripsi') }} rows="3"></textarea>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Link Artikel</label><input
                                                type="text" class="form-control" placeholder="Link" name="link_artikel" required value={{ old('link_artikel') }}>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <button class="btn btn-success profile-button" type="submit">Buat</button>
                                            <a class="btn btn-danger profile-button" href="{{ url('/dashboard')}}" data-abc="true">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </center>
        </div>
    </section>
@endsection
