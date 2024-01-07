<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\profile;
use App\Models\price;
use App\Models\order;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use Illuminate\Contracts\Support\ValidatedData;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fun_rating = order::where('pengasuh_id', auth()->user()->id)->avg('rating');
        profile::where('user_id', auth()->user()->id)->update([
            'rating' => $fun_rating
        ]);

        return view('pengasuh.homepengasuh' , [
            "head" => "Profile | Elderly Caregiver",
            "user" => User::where('id', auth()->user()->id)->first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        if (auth()->user()->id == $user->id){
            return view('pengasuh.editprofilepengasuh', compact('user'),[
                "price" => price::where('user_id', $user->id)->first(),
                "head" => "edit profile | Elderly Caregiver",
            ]);
        }else{
            return redirect('/profile');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofileRequest  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprofileRequest $request, User $user)
    {

        
        $price = $request->validate([
            'harga' => 'max:12',
        ]);

        $price['harian'] = $request->has(key:'harian');
        $price['mingguan'] = $request->has(key:'mingguan');
        $price['bulanan'] = $request->has(key:'bulanan');

        $profile = profile::where('user_id', $request->id)->first();

        $validatedata = $request->validate([
            'nama' => 'max:32',
            'ttl' => '',
            'jenis_kelamin' => '',
            'alamat' => '',
            'no_telp' => '',
            'usia' => '',
            'foto' => 'image|nullable',
        ]);

        $validatedata2 = $request->validate([
            'email' => 'nullable|email:dns',
        ]);

        if($request->file('foto')) {
            Storage::delete($profile->foto);
            $validatedata['foto'] = $request->file('foto')->store('foto_profile');
        }

        profile::where('user_id', $request->id)->update($validatedata);

        if($request->email) {
            user::where('id', $request->id) ->update($validatedata2);
        }

        price::where('user_id', $request->id)->update($price);

        return redirect('/profile');
    }
}
