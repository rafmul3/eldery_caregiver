<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use App\Models\price;
use App\Models\profile;
use App\Models\order;
use App\Models\locations;
use Illuminate\Http\Request;
use App\http\Livewire\CreateMap;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller

{
    public function pengasuh() {
        return view('pengasuh.regispengasuh', [
            "head" => "Register Pengasuh | Elderly Caregiver"
        ]);
    }

    public function chatuser() {
        return view('user.chatuser');
    }

    public function chatuserparam($user) {

        $user = user::where('id', $user)->first();
        return view('user.chatuser', [
            'user' => $user,
        ]);
    }

    public function detail(user $user) {
        return view('admin.detailuserpengasuh', compact('user'),[

            "head" => "detail User | Elderly Caregiver",
        ]);
    }

    public function download(Request $request) {
        return response()->download(public_path('storage/'.$request['cv']));

    }

    public function pelamardel(Request $request) {

        $user = User::find($request->id);
        $profile = profile::where('user_id', $request->id)->first();
        Storage::delete($profile->ktp);

        if($profile->cv) {
        Storage::delete($profile->cv);
            }

        if($profile->foto) {
            Storage::delete($profile->foto);
            }

        $user->delete();
        return redirect('/dashboard')->with('status', 'Data berhasil di hapus');

    }

    public function konfirmasi(Request $request) {
        // @dd($request);
        user::where('id', $request->id)->update([
            'status' => 'pengasuh'
        ]);

        profile::where('user_id', $request->id)->update([
            'status' => 'pengasuh'
        ]);

        $price = [
            'user_id' => $request['id'],
            'harian' => '1',
            'mingguan' => '1',
            'bulanan' => '1',
            'harga' => '50000',
        ];

        price::create($price);


        return redirect('/listuser')->with('status', 'Pengasuh berhasil ditambahkan');
    }


    public function user() {
        return view('user.regisuser', [
            "head" => "Register User | Elderly Caregiver"
        ]);
    }

    public function loginview() {
        return view('login', [
            "head" => "Login | Elderly Caregiver"
        ]);
    }

    public function listpengasuh() {

        return view('admin.listpengasuh', [

            "data" => user::where('status', 'pelamar')->get(),
            "head" => "Admin | Elderly Caregiver"
        ]);
    }
    public function detailpesan() {

        return view('admin.detailpesan', [

            "data" => order::where('status', 'Selesai' )->get(),
            "head" => "Admin | Elderly Caregiver"
        ]);
    }


    public function listuser() {

        return view('admin.listuser', [

            "data" => user::where('status', '!=', 'admin')->where('status', '!=', 'pelamar')->get(),
            "head" => "Admin | Elderly Caregiver"
        ]);
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        // dd($credentials);
        if(Auth::attempt($credentials )) {
            $request->session()->regenerate();
            user::where('id', auth()->user()->id)->update([
                'online' => 'online'
            ]);
            return redirect()->intended('/');
        }

        return back()->with('login', 'login Gagal Tolong masukan data dengan benar');
    }


    public function logout(Request $request) {
        user::where('id', auth()->user()->id)->update([
            'online' => 'offline'
        ]);
        Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }

    public function registeruser (Request $request) {

        $validateuser = $request->validate([
            'username' => 'required|max:32|unique:users',
            'email' => 'required|email:dns|unique:users|unique:users',
            'password' => 'required|min:8',
            'status' => 'required',
            'online' => '',
        ]);

        $validateprofile = $request->validate([
            'nama' => 'required|max:32',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'usia' => 'required',
            'ktp' => 'image',
            'foto' => 'image|required',
        ]);
        // @dd($request);

        if($request->file('ktp')) {
            $validateprofile['ktp'] = $request->file('ktp')->store('ktp');
        }

        $validateprofile['foto'] = $request->file('foto')->store('foto_profile');
        $validateprofile['online'] = 'offline';

        $validateuser['password'] = hash::make($validateuser['password']);

        User::create($validateuser);

        $user_id = User::where('username', $validateuser['username'])->first();
        $validateprofile['user_id'] = $user_id['id'] ;

        profile::create($validateprofile);


        $validatealamat['user_id'] = $validateprofile['user_id'];
        $validatealamat['long'] = $request->long;
        $validatealamat['lat'] = $request->lat;
        $validatealamat['alamat'] = $validateprofile['alamat'];
        locations::create($validatealamat);

        return redirect('/')->with('status', 'Registration berhasil silakan melakukan login ^_^');
    }

    public function registerpelamar(Request $request) {

        $validateuser = $request->validate([
            'username' => 'required|max:32|unique:users',
            'email' => 'required|email:dns|unique:users|unique:users',
            'password' => 'required|min:8',
            'status' => 'required',
            'online' => '',
        ]);

        $validateprofile = $request->validate([
            'nama' => 'required|max:32',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'usia' => 'required',
            'ktp' => 'image|required',
            'cv' => 'mimes:pdf|required',
            'foto' => 'image|required',
        ]);

        // Validasi file
        $validateprofile['ktp'] = $request->file('ktp')->store('ktp');

        $validateprofile['cv'] = $request->file('cv')->store('cv');

        $validateprofile['foto'] = $request->file('foto')->store('foto_profile');
        // validasi file

        $validateuser['password'] = hash::make($validateuser['password']);
        $validateprofile['online'] = 'offline';

        User::create($validateuser);

        $user_id = User::where('username', $validateuser['username'])->first();
        $validateprofile['user_id'] = $user_id['id'] ;

        profile::create($validateprofile);

        $validatealamat['user_id'] = $validateprofile['user_id'];
        $validatealamat['long'] = $request->long;
        $validatealamat['lat'] = $request->lat;
        $validatealamat['alamat'] = $validateprofile['alamat'];
        locations::create($validatealamat);

        return redirect('/')->with('status', 'Akun anda sedang di proses, Silakan menunggu akun anda diaktivasi oleh kami ^_^ ');
    }

    public function rating(Request $request, $id) {

        order::where('id', $id)->update([
            'rating' => $request->rate
        ]);

        $fun_rating = order::where('pengasuh_id', $request->pengasuh_id)->avg('rating');
        profile::where('user_id', $request->pengasuh_id)->update([
            'rating' => $fun_rating
        ]);


        return back();
    }

    public function detailuser($id) {

        $fun_rating = order::where('pengasuh_id', $id)->avg('rating');
        profile::where('user_id', $id)->update([
            'rating' => $fun_rating
        ]);


        $datas = profile::where('user_id', $id)->first();
        $datas2 = user::where('id', $id)->first();
        $price = price::where('user_id', $id)->first();
        return view('user/infopengasuh', compact('datas', 'datas2','price'));
    }


}
