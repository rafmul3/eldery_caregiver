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

    <title>Detail Pengasuh | Elderly Caregiver</title>
    <div class="container">
        <center>
            <div class="animate__animated animate__backInDown">
                <p class="h2" style="margin-top: 10px">Profile</p>
                <div class="col-md-4 mb-4" style="margin-top: 10px">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('storage/' . $datas->foto) }}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4 style="color: black">{{ $datas2->username }}</h4>
                                    <p class="text-muted font-size-sm">{{ $datas2->status }}</p>
                                </div>
                                {{-- @if ($user->profile->cv) --}}
                                <div>
                                    <p class="text-muted font-size-sm">Rating</p>
                                    
                                </div>
                                
                                @if (is_null($datas->rating))
                                <p class="text-muted font-size-sm">Belum ada Rating</p>
                                @else
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" disabled @if ($datas->rating > 4) checked @endif>
                                    <label for="star5" title="Sangat Baik">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" disabled @if ($datas->rating < 5) checked @endif>
                                    <label for="star4" title="Baik">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" disabled @if ($datas->rating < 4) checked @endif>
                                    <label for="star3" title="Oke">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" disabled @if ($datas->rating < 3) checked @endif>
                                    <label for="star2" title="Buruk">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" disabled @if ($datas->rating < 2) checked @endif>
                                    <label for="star1" title="Sangat Buruk">1 star</label>
                                </div>
                                @endif
    
                                {{-- @endif --}}
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
                                    {{ $datas->nama }}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0" style="color: black">Tanggal Lahir</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="color: black">
                                    {{ $datas->ttl }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3" style="color: black">
                                    <h6 class="mb-0" style="color: black">Jenis Kelamin</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="color: black">
                                    {{ $datas->jenis_kelamin }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3" style="color: black">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="color: black">
                                    {{ $datas->alamat }}
                                    {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="/lokasi" class="btn btn-primary"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                                </svg></a>
                                        </div> --}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3" style="color: black">
                                    <h6 class="mb-2">Nomor Telepon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="color: black">
                                    {{ $datas->no_telp }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3" style="color: black">
                                    <h6 class="mb-2">Usia</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="color: black">
                                    {{ $datas->usia }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3" style="color: black">
                                    <h6 class="mb-2">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="color: black">
                                    {{ $datas2->email }}
                                </div>
                            </div>
                            <hr>

                            <form action="/download" method="post" enctype="">
                                @csrf
                                <input type="hidden" value="{{ $datas->ktp }}" name="cv">
                                <div class="row">
                                    <div class="col-sm-3" style="color: black">
                                        <h6 class="mb-2">KTP</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="color: black">
                                        <button type="submit" class="btn btn-success"> Download</button>
                                    </div>
                                </div>
                            </form>
                            <hr>

                            @if ($datas->cv)
                            <form action="/download" method="post" enctype="">
                                @csrf
                                <input type="hidden" value="{{ $datas->cv }}" name="cv">
                                <div class="row">
                                    <div class="col-sm-3" style="color: black">
                                        <h6 class="mb-2">CV</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="color: black">
                                        <button type="submit" class="btn btn-success"> Download</button>
                                    </div>
                                </div>
                            </form>
                            @endif

                        </div>
                    </div>
                </div>


                <form action="/order" method="post">

                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                    <input type="hidden" value="{{ $datas2->id }}" name="pengasuh_id">
                    <input type="hidden" value="{{ $price->harga }}" name="harga">

                    <hr size="4px" width="90%">
                    <p class="h2" style="margin-top: 10px">Jasa yang ditawarkan</p>
                    <div class="col-md-8">
                        <div class="card mb-4">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    @if($price->harian === 1 )
                                    <div class="form-check col-2 " style="color: black">
                                        <input class="form-check-input" type="radio" name="jasa" id="harian" value="Harian">
                                        <label class="form-check-label" for="harian">
                                            Harian
                                        </label>
                                    </div>
                                    @endif
                                    @if($price->mingguan === 1)
                                    <div class="form-check col-2" style="color: black">
                                        <input class="form-check-input" type="radio" name="jasa" id="mingguan" value="Mingguan">
                                        <label class="form-check-label" for="mingguan">
                                            Mingguan
                                        </label>
                                    </div>
                                    @endif
                                    @if($price->bulanan === 1)
                                    <div class="form-check col-2" style="color: black">
                                        <input class="form-check-input" type="radio" name="jasa" id="bulanan" value="Bulanan">
                                        <label class="form-check-label" for="bulanan">
                                            Bulanan
                                        </label>
                                    </div>
                                    @endif

                                    {{-- <div class="input-group input-daterange">
                                            <input type="text" id="start" class="form-control text-left mr-2">
                                            <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start
                                                Date</label>
                                            <span class="fa fa-calendar" id="fa-1"></span>
                                            <input type="text" id="end" class="form-control text-left ml-2">
                                            <label class="ml-3 form-control-placeholder" id="end-p" for="end">End
                                                Date</label>
                                            <span class="fa fa-calendar" id="fa-2"></span>
                                        </div> --}}

                                </div>

                                {{-- <div class="row mt-4">
                                    <div class="col-2" style="color: black">
                                        <h6 class="mb-2">Harga</h6>
                                    </div>
                                    <div class=" col-5 ">
                                        <input type="text" class="form-control" placeholder="Rp.00" name="harga" id="harga">
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
        </center>
    </div>

    <div class="container">
        <center>
            <hr>
            <div class="animate__animated animate__backInRight">
                <p class="h2" style="margin-top: 10px">Form Informasi Lansia</p>
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="row mt-2">
                                    <div class="col-md-12" style="color: black"><label class="labels">Tanggal Pemesanan</label>
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>

                                    <div class="col-mt-3"><label class="labels" style="color: black">Nomor Telpon Darurat</label>
                                        <input type="text" class="form-control" placeholder="Nomor Telpon kerabat terdekat" name="no_telp_kerabat">
                                    </div>

                                    <div class="col-md-12"><label class="labels" style="color: black">Riwayat Penyakit</label>
                                        <textarea class="form-control" placeholder="Contoh : diabetes" name="penyakit"></textarea>
                                    </div>

                                    <div class="col-md-12"><label class="labels" style="color: black">Catatan</label>
                                        <textarea class="form-control" placeholder="Contoh : injeksi insulin sebelum makan" name="catatan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </center>
    </div>

    {{-- <div class="container">
            <center>
            <hr>
            <p class="h2" style="margin-top: 10px">Total Harga</p>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Rp.00" name="pengarang">
                                </div>
                        </div>
                    </div>
                </div>
            </center>
        </div> --}}

    <div class="container">
        <center>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pesan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="1" style="color: black">Konfirmasi pesanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="color: black">
                                Apakah anda yakin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
                <a href="/" class="btn btn-danger mb-5">Batal</a>
            </div>


        </center>
    </div>

    {{-- <script>
            let radioBtns = document.querySelectorAll("input[name='jasa']");
            let result = document.getElementById("harga");

            let findSelected = () => (let selected = document.querySelector("input[name='jasa']:checked").value;
                result.textContent = 'value of selected radio button: $(selected)';
            )

            radioBtns.foreach(radioBtns => {
                radioBtns.addEventListener("change", findSelected);
            });

            findSelected();
         </script> --}}

</section>

@endsection