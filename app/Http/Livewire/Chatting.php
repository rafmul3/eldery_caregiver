<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\resident;
use App\Models\chat;
use App\Models\room;
use App\Models\user;

class Chatting extends Component
{
    public $user, $room_id, $pesan, $meki;
    public $roomate, $messages;

    public function mount($user = null)
    {
        if($this->user !== null){
            $room = resident::where('user_id', auth()->user()->id)->get();
            foreach($room as $roomate){
                $rooms = resident::where('room_id', $roomate->room_id)->get();
                foreach($rooms as $roomates){
                    if($roomates->user_id == $this->user['id']) {
                        $this->roomate = $roomates;
                        $this->messages = chat::where('room_id', $this->roomate['room_id'])->get();
                        $this->room_id = $this->roomate['room_id'];
                    }
                }
            }

        }

    }


    public function message()
    {
        if($this->user != null){
            $this->messages = chat::where('room_id', $this->roomate['room_id'])->get();
            $checkmessages = chat::where('room_id', $this->roomate['room_id'])->where('status', 'terkirim')->get();
            foreach($checkmessages as $checkmessage) {
                if($checkmessage->user_id !== auth()->user()->id) {
                    chat::where('id', $checkmessage->id)->update([
                        'status' => 'read'
                    ]);
                }

            }
        }
    }

    protected $listeners = [
        'switchroom'
    ];

    public function render()
    {
        return view('livewire.chatting');
    }

    public function switchroom($room)
    {
        $this->room_id = $room['room_id'];
        $this->user = user::where('id', $room['user_id'])->first();
        $this->roomate = resident::where('id', $room['id'])->first();
        $this->messages = chat::where('room_id', $room['room_id'])->get();
    }

    public function store()
    {
        if($this->room_id == null) {
            room::create();

            $room = room::orderBy('id', 'DESC')->first();
            $this->room_id = $room->id;

            resident::create([
                'room_id' => $this->room_id,
                'user_id' => auth()->user()->id,
            ]);

            resident::create([
                'room_id' => $this->room_id,
                'user_id' => $this->user->id,
            ]);

            $this->roomate = resident::orderBy('id', 'DESC')->first();

        }

        $chat = chat::create([
            'room_id' => $this->room_id,
            'user_id' => auth()->user()->id,
            'message' => $this->pesan,
            'status' => 'terkirim',
        ]);

        $this->pesan = null;

        $this->emit('addroom');
        $this->messages = chat::where('room_id', $this->room_id)->get();
    }

}
