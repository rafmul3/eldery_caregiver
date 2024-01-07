<div @if($messages) wire:poll="message"@endif class="col-12 col-lg-7 col-xl-9">

    @if($user)
    <div class="py-2 px-4 border-bottom d-none d-lg-block">
        <div class="d-flex align-items-center py-1">
            <div class="position-relative">
                <img src="{{ asset('storage/' . $user->profile->foto) }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
            </div>
            <div class="flex-grow-1 pl-3">

            <strong>{{ $user->profile->nama }}</strong>

                <div class="text-muted small"><em> {{ $user->online }}</em></div>
            </div>
            {{-- <div>
                <button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
                <button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
                <button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
            </div> --}}
        </div>
    </div>

    <div class="position-relative">
        {{-- awal --}} 
        <div class="chat-messages p-4">
            @if($messages)
            @foreach($messages as $message)
            @if($message->user->username == auth()->user()->username)
            <div class="chat-message-right pb-4">
                <div>
                    <img src="{{ asset('storage/' . $message->user->profile->foto) }}" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                    <div class="text-muted small text-nowrap mt-2">{{ $message->created_at->diffForHumans(null, false, false) }}</div>
                </div>
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                    <div class="mb-1" style="font-weight: bold">You</div>
                    {{ $message->message }}
                </div>
            </div>
            @else

            <div class="chat-message-left pb-4">
                <div>
                    <img src="{{ asset('storage/' . $message->user->profile->foto) }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                    <div class="text-muted small text-nowrap mt-2">{{ $message->created_at->diffForHumans(null, false, false) }}</div>
                </div>
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                    <div class="mb-1" style="font-weight: bold">{{ $message->user->profile->nama }}</div>
                    {{ $message->message }}
                </div>
            </div>
            
            @endif
            @endforeach
        </div>
        @endif
        {{-- form input --}}
            
        </div>
        <div class=" py-3 px-4 mb-4 border-top">
            <div class="text">
                <form wire:submit.prevent="store" class="input-group">
                <input wire:model="pesan" type="text" name= "" id="" class="form-control" placeholder="Masukkan pesan">
                @if($pesan)
                <button type="submit" class="btn btn-primary">Kirim</button>
                @else
                <a type="submit" class="btn btn-primary">Kirim</a>
                 @endif
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@else


{{-- iniii buat welcome --}}
<center>
    <div class="jumbotron jumbotron-fluid" style="margin-top: 175px">
    <div class="container">
        <div class="animate__animated animate__backInRight">
            <p class="h2" style="margin-top: 20px">Welcome to Elderly Caregiver</p>
            <img src="https://img.freepik.com/free-vector/nursery-home-senior-care-facilities-elderly-disabled-residents-daily-activities-assistance-flat-horizontal-banner-vector-illustration_1284-30808.jpg?t=st=1647958368~exp=1647958968~hmac=aef4471e9d68f17f6932ba8c18f44c63bbad89437153316358d2727b3578f802&w=1060" class="img-fluid" width="600px" height="600px">
            <p>Silahkan berkomunikasi antar pengguna dengan menggunakan fitur Chat ini. Gunakanlah bahasa dengan baik dan bijak!</p>
        </div>
    </div>
</div>
</center>








@endif
</div>
