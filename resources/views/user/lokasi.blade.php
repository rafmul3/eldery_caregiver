@extends('layouts.navbar')
@section('isi')
{{ $slot }}

<title>Lokasi Pengasuh | Elderly Caregiver</title>


<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />


@endsection