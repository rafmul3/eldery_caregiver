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
                <p class="h2" style="margin-top: 10px">Jasa yang dipilih</p>
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Jasa</option>
                                        <option value="1">Harian</option>
                                        <option value="2">Mingguan</option>
                                        <option value="3">Bulanan</option>
                                    </select>
                                    <div class="input-group input-daterange">
                                        <input type="text" id="start" class="form-control text-left mr-2">
                                        <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start
                                            Date</label>
                                        <span class="fa fa-calendar" id="fa-1"></span>
                                        <input type="text" id="end" class="form-control text-left ml-2">
                                        <label class="ml-3 form-control-placeholder" id="end-p" for="end">End
                                            Date</label>
                                        <span class="fa fa-calendar" id="fa-2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <hr>
                <div class="animate__animated animate__backInRight">
                    <p class="h2" style="margin-top: 10px">Form Informasi Lansia</p>
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row mt-2">
                                        <div class="col-mt-3"><label class="labels">Nama Lansia</label>
                                            <input type="text" class="form-control" placeholder="Nama Lansia" name="pengarang">
                                        </div>

                                        <div class="col-md-12"><label class="labels">Tanggal Lahir</label>
                                            <input type="date" class="form-control">
                                        </div>

                                        <div class="col-mt-3"><label class="labels">Umur Lansia</label>
                                            <input type="text" class="form-control" placeholder="Umur Lansia" name="pengarang">
                                        </div>

                                        <div class="col-mt-3">
                                            <label for="jeniskelamin" class="form-label">Jenis Kelamin Lansia</label><br>
                                            <select type="option" class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jeniskelamin" name="jenis_kelamin" placeholder=" Jenis Kelamin Lansia" >
                                                <option selected>laki-laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="col-mt-3"><label class="labels">Alamat Lansia</label>
                                            <input type="text" class="form-control" placeholder="Alamat Lansia" name="pengarang">
                                        </div>

                                        <div class="col-mt-3"><label class="labels">Nomor Telpon Lansia</label>
                                            <input type="text" class="form-control" placeholder="Nomor Telpon Lansia" name="pengarang">
                                        </div>

                                        <div class="col-mt-3"><label class="labels">Nomor Telpon Darurat</label>
                                            <input type="text" class="form-control" placeholder="Nomor Telpon kerabat terdekat" name="pengarang">
                                        </div>

                                        <div class="col-md-12"><label class="labels">Riwayat Penyakit</label>
                                            <textarea class="form-control" placeholder="Contoh : diabetes" name="deskripsi" ></textarea>
                                        </div>

                                        <div class="col-md-12"><label class="labels">Catatan</label>
                                            <textarea class="form-control" placeholder="Contoh : injeksi insulin sebelum makan" name="deskripsi" ></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr size="4px" width="90%">
                <p class="h2" style="margin-top: 10px">Total Harga</p>
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Rp.00" name="pengarang">
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
