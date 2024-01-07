<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use File;


class ArtikelController extends Controller
{
    public function show(){

        return view('admin/homeartikel');
    }


    public function posting(Request $request){
        $rules = [
            'gambarArtikel' => 'image|file',
            'judul' => 'required|unique:artikel'
        ];

        $validatedData = $request->validate($rules);


        $gambar = time().'.'.$request->gambarArtikel->extension();
        $request->gambarArtikel->move(public_path('gambar_artikel'), $gambar);
        $tulis = new artikel();

        $tulis->pengarang = $request->pengarang;
        $tulis->judul = $request->judul;
        $tulis->deskripsi = $request->deskripsi;
        $tulis->link_artikel = $request->link_artikel;
        $tulis->gambar = $gambar;

        $tulis->save();

        return redirect('/dashboard')->with('status', 'Artikel berhasil diposting!!!');
    }

    public function dashboard(){

        $pengasuh = user::where('status', 'pengasuh')->count();
        $pengguna = user::where('status', 'user')->count();

        $datas = artikel::latest()->paginate(3);

        return view('admin/dashboard', compact('datas', 'pengasuh', 'pengguna'));
    }

    public function editartikel($id){

        $datas = artikel::where('id', $id)->first();

        return view('admin/artikeledit', compact('datas'));
    }

    public function updateArtikel(Request $request, $id){

        $rules = [
            'gambarArtikel' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('gambarArtikel')) {
            if($request->gambarLama){
                File::delete(public_path('gambar_artikel/'.$request->gambarLama));
            }
            $gambar = time().'.'.$request->gambarArtikel->extension();
            $validatedData['gambarArtikel'] = $request->gambarArtikel->move(public_path('gambar_artikel'), $gambar);
        }




        artikel::where('id', $id)->update([
            'pengarang' => $request->input('pengarang'),
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'link_artikel' => $request->input('link_artikel')
        ]);

        if($request->file('gambarArtikel')) {
            artikel::where('id', $id)->update([
                'gambar' => $gambar
            ]);
        }

        return redirect('/dashboard')->with('status', 'Artikel berhasil diupdate!!!');
    }

    public function hapusartikel($id){


        $model = artikel::find($id);
        $artikel = artikel::where('id', $id)->first();
        File::delete(public_path('gambar_artikel/'.$artikel->gambar));
        $model->delete();

        return redirect('/dashboard')->with('status', 'Artikel berhasil dihapus!!!');
    }

    public function index(Request $request){

        $datas = artikel::latest()->paginate(4);
        $filter = profile::where('status', 'pengasuh')->latest();

        if (auth()->guest()){
            return view('welcome', compact('datas'));
        }elseif (auth()->user()->status == 'Admin'){
            return redirect('dashboard');
        }elseif (auth()->user()->status == 'Pengasuh'){
            return redirect('/profile');
        }else{
            if (request('search')){

                if ( $request->filter == '1'){
                    $filter = profile::where('status', 'pengasuh')->where('nama', 'like', '%' . request('search') . '%')->orderBy('nama', 'asc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '2'){
                    $filter = profile::where('status', 'pengasuh')->where('jenis_kelamin', 'like', '%' . request('search') . '%')->orderBy('jenis_kelamin', 'desc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '3'){
                    $filter = profile::where('status', 'pengasuh')->where('alamat', 'like', '%' . request('search') . '%')->orderBy('alamat', 'desc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '4'){
                    $filter = profile::where('status', 'pengasuh')->where('usia', 'like', '%' . request('search') . '%')->orderBy('usia', 'asc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '5'){
                    $filter = profile::where('status', 'pengasuh')->where('rating', 'like', '%' . request('search') . '%')->orderBy('rating', 'desc')->paginate(4)->withQueryString();
                }
                else{
                    $filter = profile::where('status', 'pengasuh')->where('nama', 'like', '%' . request('search') . '%')
                       ->where('status', 'pengasuh')->orWhere('jenis_kelamin', 'like', '%' . request('search') . '%')
                       ->where('status', 'pengasuh')->orWhere('alamat', 'like', '%' . request('search') . '%')
                       ->where('status', 'pengasuh')->orWhere('usia', 'like', '%' . request('search') . '%')
                       ->where('status', 'pengasuh')->orWhere('rating', 'like', '%' . request('search') . '%')
                       ->paginate(4)->withQueryString()
                       ;
                }

            }else{
                if ( $request->filter == '1'){
                    $filter = profile::where('status', 'pengasuh')->orderBy('nama', 'asc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '2'){
                    $filter = profile::where('status', 'pengasuh')->orderBy('jenis_kelamin', 'desc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '3'){
                    $filter = profile::where('status', 'pengasuh')->orderBy('usia', 'desc')->paginate(4)->withQueryString();
                }elseif ($request->filter == '4'){
                    $filter = profile::where('status', 'pengasuh')->orderBy('usia', 'asc')->paginate(4)->withQueryString();
                }else{
                    $filter = $filter->paginate(4)->withQueryString();
                }
            }


            return view('welcome', compact('datas', 'filter'));
        }
    }

}
