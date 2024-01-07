<!DOCTYPE html>
<html lang="en">
    <head>
        @livewireStyles
        {{-- <!-- Required meta tags --> --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <!-- Bootstrap CSS --> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <link rel="stylesheet" type="text/css" href="/css/layout.css">


        {{-- <Style CSS> --}}
        <style type="text/css">
        body{
            background: #38A3A5;
            color: #ffffff;
            position: relative;
        }

        .footer{
            width: 100%;
            height: 40px;
            display: flex;
            background: #22577A;
            justify-content: center;
	        align-items: center;
            color:#ffffff;
            position: absolute;
	        bottom: 0;

        }
        </style>
    </head>

<body>
    <div style="min-height: 100vh; position: relative;">
    @can('pelamar')

    @else

    {{-- <konten navbar> --}}
    <nav class="navbar navbar-light" style="background-color: #22577A;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="color:white">
                <img src="https://drive.google.com/uc?export=view&id=1WSPg63VWGAPT5dxcM2i_37w95BbDCEQS" width="50px" height="50px">
                Elderly Caregiver
            </a>

            @auth

            <div class="btn-group me-5">
                <button type="button" class="btn btn-success dropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg> {{ auth()->user()->username }}
                </button>
                <ul class="dropdown-menu">
                    @canany(['pengasuh','user'])
                    <li><a class="dropdown-item" href="/order"><i class="bi bi-cart"></i> Pesanan</a></li>
                    <li><a class="dropdown-item" href="/chatuser"><i class="bi bi-chat-dots"></i> Chat</a></li>
                    @can('user')
                    <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-lines-fill"></i> Edit Profile</a></li>
                    @endcan
                    @endcanany
                    <li><form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                    </form></li>
                </ul>
            </div>

            @else

            <div class="btn-group me-5">
                <button type="button" class="btn btn-0 dropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                    Register
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/regispengasuh">Pengasuh</a></li>
                    <li><a class="dropdown-item" href="/regisuser">User</a></li>
                </ul>
                <a class="btn btn-success" href="/login" role="button">Login</a>
            </div>

            @endauth
        </div>
    </nav>

    @endcan
    @yield('isi')


</div>

<br>
<div class="footer">
    © 2022• Kelompok 4 | SI4305 • All Rights Reserved
    </div>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
