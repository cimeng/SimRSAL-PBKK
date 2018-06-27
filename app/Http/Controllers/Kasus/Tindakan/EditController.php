<?php

namespace App\Http\Controllers\Kasus\Tindakan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tindakan;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\TagihanDetail;

class EditController extends Controller
{

	public function edit(Request $request, $nomor_kasus)
	{	
		$tindakan = Tindakan::find($request->id);
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();

		if(!empty($tindakan->tagihan_detail_id))
		{
			$tagihanDetail = TagihanDetail::find($tindakan->tagihan_detail_id);
			$old_price = $tagihanDetail->nominal;

			$tagihanDetail->desc = $request->desc;
			$tagihanDetail->nominal = $request->price;
			$tagihanDetail->unit_price = $request->price;
			$tagihanDetail->save();

			$new_nominal = $request->price - $old_price;

			$tagihan = app('App\Http\Controllers\Kasus\Tagihan\EditController')->edit_bill($tagihanDetail->kasus_tagihan_id,$new_nominal);
		}

		$tindakan->desc = $request->desc;
		$tindakan->price= $request->price;
		$tindakan->save();


		$status = 1;
		$message = 'Tindakan berhasil diubah!';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'edit','tindakan',$tindakan->id);

		return back()
		->with('active_nav','tindakan')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}

}
