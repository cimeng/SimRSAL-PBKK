<?php

namespace App\Http\Controllers\Kasus\TagihanDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\TagihanDetail;
use App\Models\Kasus\Kasus;
use Auth;

class PostController extends Controller
{
    public function create(Request $request,$nomor_kasus)
    {
        $kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
        $data['kasus_id'] = $request->kasus_id;
        $data['desc'] = $request->desc;
        $data['unit_price'] = $request->unit_price;
        $data['qty'] = $request->qty;
        $data['tagihan_id'] = $request->tagihan_id;
        $data['daftar_harga_id'] = $request->daftar_harga_id;
        $data['lokasi'] = $kasus->lokasi->lokasi;


        $createDetail = app('App\Http\Controllers\Kasus\TagihanDetail\CreateController')->create($data);


        $status = 1;
        $message = 'Tagihan berhasil ditambahkan';
        $title = 'Berhasil!';

        return back()
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }

    public function edit(Request $request,$nomor_kasus)
    {
        $kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
        $data['id'] = $request->id;
        $data['kasus_id'] = $request->kasus_id;
        $data['desc'] = $request->desc;
        $data['unit_price'] = $request->unit_price;
        $data['qty'] = $request->qty;
        $data['tagihan_id'] = $request->tagihan_id;
        $data['daftar_harga_id'] = $request->daftar_harga_id;
        $data['lokasi'] = $kasus->lokasi->lokasi;


        $editDetail = app('App\Http\Controllers\Kasus\TagihanDetail\EditController')->edit($data);


        $status = 1;
        $message = 'Tagihan berhasil ditambahkan';
        $title = 'Berhasil!';

        return back()
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }

    public function delete($nomor_kasus,Request $request)
    {
        $tagihan = TagihanDetail::find($request->id);
        $kasusId = $tagihan->kasus_id;
        $tagihanId = $tagihan->id;
        $new_nominal = $tagihan->nominal * -1;
        $tagihan->delete();

        $status = 1;
        $message = 'Tagihan berhasil dihapus!';
        $title = 'Berhasil!';

        $tagihan = app('App\Http\Controllers\Kasus\Tagihan\EditController')->edit_bill($tagihan->kasus_tagihan_id,$new_nominal);


        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
        ->create($kasusId,'delete','tagihan',$tagihanId);

        return back()
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }

}
