<div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="animate__animated animate__backInLeft col-5 pt-3">
                <form class="pt-5" action="/regisuser" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="pt-2">Register to Elderly Caregiver</h3>
                    <p>Kebahagiaanmu dimulai dari sini</p><hr>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama" placeholder="Masukkan Nama Lengkap Anda" required value={{ old('nama') }} >
                    </div>

                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="tanggallahir" name="ttl"  required value={{ old('ttl') }}>
                    </div>

                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                        <select type="option" class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jeniskelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin Anda" required value={{ old('jenis_kelamin') }} >
                            <option selected>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="form-label">Alamat</label><br>
                        <div class="col-12">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required value={{ old('alamat') }} >
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="notlp" class="form-label">Nomor Telepon</label><br>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="notlp" name="no_telp" placeholder="Masukkan Nomor Telepon Anda" required value={{ old('no_telp') }} >
                    </div>

                    <div class="mb-3">
                        <label for="usia" class="form-label">Usia</label><br>
                        <input type="text" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" placeholder="Masukkan Usia Anda" required value={{ old('usia') }} >
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan Username Anda" required value={{ old('nama') }} >

                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email Anda" required value={{ old('email') }} >

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password Anda" required>

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Foto</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">

                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ktp" class="form-label">Upload KTP</label>
                        <input class="form-control @error('ktp') is-invalid @enderror" type="file" id="ktp" name="ktp">

                        @error('ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <input type="hidden" value="{{ $long }}" name="long">
                    <input type="hidden" value="{{ $lat}}" name="lat">
                    <input type="hidden" value="user" name="status">

                    <center><div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <p>Sudah Punya Akun? <a class="link-primary" href="/login">Login</a></p></center>
                </form>
            </div>
        <div class="animate__animated animate__backInRight  col-4 pt-6">
            <div class="mx-auto " wire:ignore id='map' style='width: 600px; height: 600px; Margin-left: 10px; Margin-top: 300px'></div>
            {{-- <img src="https://drive.google.com/uc?export=view&id=1-60_Cdoeg-BezVa3Vd2qW5_BBwERylfc" alt="" width="600px" height="600px" style= "Margin-left: 10px; Margin-top: 300px"> --}}
        </div>
    </div>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />

</div>





</div>

@push('scripts')

    <script>

    document.addEventListener('livewire:load', () => {

    const defaultlocation = [107.60531614849594, -6.9355762735191036]

    mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
    var map = new mapboxgl.Map({
        container: 'map',
        center: defaultlocation,
        zoom: 12.10,
        style: 'mapbox://styles/mapbox/streets-v11'
    });

    map.addControl(new mapboxgl.NavigationControl())

    map.on('click', (e) => {
        const longtitude = e.lngLat.lng
        const lattitude = e.lngLat.lat

        @this.long = longtitude
        @this.lat = lattitude

        })
    })

    </script>

@endpush
