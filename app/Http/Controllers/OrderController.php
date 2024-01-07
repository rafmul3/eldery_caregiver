<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\User;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pengasuh.pesanan' , [
            "head" => "Profile | Elderly Caregiver",
            "user" => User::where('id', auth()->user()->id)->first(),
            "pesanan_user" => order::where('user_id', auth()->user()->id )->get(),
            "pesanan_pengasuh" => order::where('pengasuh_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $request)
    {
        $request['jenis'] = 'test';
        
        $validateorder = $request->validate([
            'user_id' => '',
            'pengasuh_id' => '',
            'tanggal' => '',
            'jenis'=> '',
            'no_telp' => '',
            'no_telp_kerabat' => '',
            'penyakit' => '',
            'catatan' => '',
        ]);
     
        if ($request->jasa == "Harian" ){
            $validateorder['harga'] = $request->harga;
            $validateorder['jenis'] = 'harian';
        }elseif ($request->jasa == "Mingguan"){
            $validateorder['harga'] = $request->harga * 7;
            $validateorder['jenis'] = 'mingguan';
        }elseif ($request->jasa == "Bulanan"){
            $validateorder['harga'] = $request->harga * 30;
            $validateorder['jenis'] = 'bulanan';
        }
        
        $validateorder['status'] = 'Request';
        
        order::create($validateorder);

        return redirect('/')->with('status', 'Pesanan berhasil dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order, )
    {
        
        order::where('id', $order->id)->update([
            'status' => $request->status
        ]);

        

        if($request->file('bukti_bayar')) {

            $rules = [
                'bukti_bayar' => 'image|file'
            ];
            
            $validatedData = $request->validate($rules);

            $gambar = time().'.'.$request->bukti_bayar->extension();
            $request->bukti_bayar->move(public_path('bukti_bayar'), $gambar);
    
            order::where('id', $order->id)->update([
                'bukti_bayar' => $gambar
            ]);
        }

       


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        order::where('id', $order->id)->delete();

        return back();
    }
}
