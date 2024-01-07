@extends('layouts.navbar')

@section('isi')

<title>Chat User | Elderly Caregiver</title>
<style>
    body{
        color: black;
        padding-bottom: 40px;
    }

    /* .chat-online {
        color: #34ce57
    }

    .chat-offline {
        color: #e4606d
    } */

    .chat-messages {
        display: flex;
        flex-direction: column;
        min-height: 70vh;
        max-height: 70vh;
        overflow-y: scroll
    }

    .chat-message-left,
    .chat-message-right {
        display: flex;
        flex-shrink: 0
    }

    .chat-message-left {
        margin-right: auto
    }

    .chat-message-right {
        flex-direction: row-reverse;
        margin-left: auto
    }
    .py-3 {
        padding-top: 1rem!important;
        padding-bottom: 1rem!important;
    }
    .px-4 {
        padding-right: 1rem!important;
        padding-left: 1rem!important;
    }
    .flex-grow-0 {
        flex-grow: 0!important;
    }
    .border-right{
        border-right: 1px solid #dee2e6!important;
    }
    .border-top {
        border-top: 1px solid #dee2e6!important;
    }
    .font-weight{
        font-weight: bold;
    }
</style>

<main class="content">
    <div class="container p-0">

		<div class="h3 mb-4"></div>

		<div class="card" style="min-height: 90vh; max-height: 90vh;">
			<div class="row g-0">
		{{-- sidebar --}}
				<div class="col-12 col-lg-5 col-xl-3 border-right">
					<div class="px-4 d-none d-md-block">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1 my-3">
								{{-- <input type="text" class="form-control my-3" placeholder="Cari..."> --}}
							</div>
						</div>
					</div>

					<livewire:room-controller> </livewire:room-controller>


				</div>
{{-- side bar --}}
@isset($user)
	<livewire:chatting :user="$user"> </livewire:chatting>
	@else
	<livewire:chatting> </livewire:chatting>
@endif

</main>
@endsection
