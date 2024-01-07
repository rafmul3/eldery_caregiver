<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\resident;
use App\Models\room;
use App\Models\user;

class RoomController extends Component
{

    // public $search, $room;

    protected $listeners = [
        'addroom'
    ];
    public function lastmessage()
    {
        // if($this->room){
            $room = resident::where('user_id', auth()->user()->id)->get();
            
        // }
    }

    public function render()
    {
        // if ($this->search === null){
            // $this->room = resident::where('user_id', auth()->user()->id)->get();
            // } else {
                //     $user = user::where('username', 'like', '%' . $this->search . '%')->first();
                //     if($user){
                    //         $this->room =  resident::where('user_id', $user->id)->get();
                    //         dd($this->room);
                    //     }
                    // }
        $room = resident::where('user_id', auth()->user()->id)->get();
        $user = user::where('id', auth()->user()->id)->first();

        return view('livewire.room', [
            'room' => $room,
            'user' => $user,
        ]);
    }

    public function switchroom($room_id)
    {
        $room = resident::where('id', $room_id)->first();
        $this->emit('switchroom', $room);
    }

    public function addroom()
    {

    }
}
