@extends('layouts.navbar')

@section('isi')
<style type="text/css">

form{
    background: #fff;
    padding: 40px;
    color: black;
    border-radius: 10px;
    margin-top: 10px;
    align-content: center;
}

</style>

<title>{{ $head }}</title>
{{ $slot }}
@endsection
