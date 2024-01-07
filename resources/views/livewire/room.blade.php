{{-- <div class="px-4 d-none d-md-block">
    <div class="d-flex align-items-center">
        <div class="flex-grow-1">
            <input wire:model="search" type="text" class="form-control my-3" placeholder="Cari...">
        </div>
    </div>
</div> --}}
<div wire:poll="lastmessage" style="overflow-y: scroll; min-height: 85vh; max-height: 85vh;">
    @foreach($room as $rooms) {{-- mencari room --}}

        @foreach($rooms->room->resident as $roomate){{-- mencari pasangan room --}}

            @if($roomate->user->username != $user->username)
                <button wire:click="switchroom({{ $roomate->id }})" class="list-group-item list-group-item-action border-0">
                @if($roomate->room->chat->where('user_id', $roomate->user->id)->where('status', 'terkirim')->count() !== 0) <div class="badge bg-success float-right">{{ $roomate->room->chat->where('status', 'terkirim')->count() }}</div> @endif
                    <div class=" d-flex align-items-start">
                        <img src="{{ asset('storage/' . $roomate->user->profile->foto) }}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                            {{ $roomate->user->profile->nama }}
                            <div class="small"><span class="fas fa-circle chat-online"></span> {{$roomate->room->chat->last()->message}}</div>
                        </div>
                    </div>
                </button>
            </form>
            @endif
        @endforeach

    @endforeach
    <hr class="d-block d-lg-none mt-1 mb-0">
</div>
