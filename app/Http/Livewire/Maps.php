<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\locations;

class Maps extends Component

{
    public $long, $lat, $alamat, $user_id, $locationId, $nama, $no_telp;
    public $geoJson;

    
    private function loadlocation(){
        $pengasuhs = User::where('status', 'pengasuh')->get();        
        $users = User::where('id', auth()->user()->id)->first();


        $customlocation = [];

        foreach($pengasuhs as $user) {
            $customlocation[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$user->locations->long, $user->locations->lat],
                    'type' => 'Point',
                ],
                'properties' => [
                    'locationId' => $user->locations->id,
                    'alamat' => $user->locations->alamat,
                    'image' => 'url( https://www.freepnglogos.com/uploads/pin-png/orange-map-pin-transparent-png-stickpng-17.png)'

                ],

            ];
        }

        $customlocation[] = [
            'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$users->locations->long, $user->locations->lat],
                    'type' => 'Point',
                ],
                'properties' => [
                    'locationId' => $users->locations->id,
                    'alamat' => $users->locations->alamat,
                    'image' => 'url(https://www.freepnglogos.com/uploads/pin-png/flat-design-map-pin-transparent-png-stickpng-31.png)'
                    
                ],
            ];

        $geolocation = [
            'type' => 'FeatureCollection',
            'features' => $customlocation,
        ];

        $geoJson = collect($geolocation)->toJson();
        $this->geoJson = $geoJson;
    }

    
    public function findlocation($id){
        $location = locations::findOrFail($id);
        
        $this->long = $location->long;
        $this->lat = $location->lat;
        $this->user_id = $location->user_id;
        $this->alamat = $location->alamat;
        $this->locationId = $location->id;   
        $this->nama = $location->user->nama;   
        $this->no_telp = $location->user->no_telp;   
    }
    
    public function render()
    {
        $this->loadlocation();
        return view('livewire.maps')->layout('user.lokasi');
    }
}
