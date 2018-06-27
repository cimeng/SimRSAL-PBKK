<?php

namespace App\Http\Controllers\Kasus\TagihanDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tagihan;
use App\Models\Kasus\TagihanDetail;
use Auth;

class CreateController extends Controller
{
	/*OLD*/
    	public function createTagihanDetail($tagihan_id,$lokasi,$data)
	{
		$detail = new TagihanDetail;
		$detail->kasus_tagihan_id = $tagihan_id;
		$detail->desc = $data['desc'];
		$detail->lokasi = $lokasi;
		$detail->nominal = $data['nominal'];
		$detail->unit_price = $data['unit_price'];
		$detail->qty = $data['qty'];
		$detail->daftar_harga_id = $data['daftar_harga_id'];
         	$detail->created_by = Auth::user()->id;
		$detail->save();

		$tagihan = app('App\Http\Controllers\Kasus\Tagihan\EditController')->edit_bill($tagihan_id,$data['nominal']);

		return json_encode([
			'status' => 200,
			'detail' => $detail
		]);

	}

	public function create($data)
	{
		$detail = new TagihanDetail;
		$detail->kasus_tagihan_id = $data['tagihan_id'];
		$detail->desc = $data['desc'];
		$detail->lokasi = $data['lokasi'];
		$detail->nominal = $data['unit_price'] * $data['qty'];
		$detail->unit_price = $data['unit_price'];
		$detail->qty = $data['qty'];
		$detail->daftar_harga_id = $data['daftar_harga_id'];
         	$detail->created_by = Auth::user()->id;
		$detail->save();


		$tagihan = app('App\Http\Controllers\Kasus\Tagihan\EditController')->edit_bill($detail->kasus_tagihan_id,$detail->nominal);

		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($data['kasus_id'],'create','tagihan',$detail->id);
		
		return $detail;

	}
}
