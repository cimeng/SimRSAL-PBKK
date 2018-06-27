<?php

namespace App\Http\Controllers\Kasus\Tindakan;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Tindakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CreateController extends Controller
{
    public function createNewTindakan(Request $request,$nomor_kasus) 
    {

        $kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
        $kasus_id = $kasus->id;
        $tindakan = new Tindakan();
        $tindakan->kasus_id = $kasus->id;
        $tindakan->desc= $request->input('desc');
        $tindakan->price= $request->input('price');
        $tindakan->created_by = Auth::user()->id;
        $tindakan->save();

        $tagihan = 0;
        if($request->input('tagihan') == 'on')
        {
            $tagihan_id = $kasus->tagihan->id;
            $data['kasus_id'] = $kasus_id;
            $data['desc'] = $request->desc;
            $data['unit_price'] = $request->price;
            $data['qty'] = 1;
            $data['tagihan_id'] = $tagihan_id;
            $data['lokasi'] = $kasus->lokasi->lokasi;
            $data['daftar_harga_id'] = 0;
            $createDetail = app('App\Http\Controllers\Kasus\TagihanDetail\CreateController')->create($data);
            $tindakan->tagihan_detail_id= $createDetail->id;
            $tindakan->save();
        }


        $status = 1;
        $message = 'Tindakan baru berhasil dibuat!';
        $title = 'Berhasil!';


        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
        ->create($kasus->id,'create','tindakan',$tindakan->id);



        return back()
        ->with('active_nav','tindakan')
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }
}
