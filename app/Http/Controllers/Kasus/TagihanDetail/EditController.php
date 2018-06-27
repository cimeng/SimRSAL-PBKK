<?php

namespace App\Http\Controllers\Kasus\TagihanDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tagihan;
use App\Models\Kasus\TagihanDetail;

class EditController extends Controller
{
	public function edit($data)
	{
		$id = $data['id'];
		$detail = TagihanDetail::find($id);
		$old_price = $detail->nominal;
		$new_price = $data['unit_price'] * $data['qty'];


		$detail->kasus_tagihan_id = $data['tagihan_id'];
		$detail->desc = $data['desc'];
		$detail->lokasi = $data['lokasi'];
		$detail->nominal = $data['unit_price'] * $data['qty'];
		$detail->unit_price = $data['unit_price'];
		$detail->qty = $data['qty'];
		$detail->daftar_harga_id = $data['daftar_harga_id'];
		$detail->created_by = 0;
		$detail->save();


		$new_nominal = $new_price - $old_price;

		$tagihan = app('App\Http\Controllers\Kasus\Tagihan\EditController')->edit_bill($detail->kasus_tagihan_id,$new_nominal);

		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($data['kasus_id'],'edit','tagihan',$detail->id);
		
		return $detail;

	}
}
