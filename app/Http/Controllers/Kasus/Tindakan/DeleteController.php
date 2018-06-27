<?php

namespace App\Http\Controllers\Kasus\Tindakan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tindakan;
use App\Models\Kasus\TagihanDetail;
use App\Models\Kasus\Kasus;

class DeleteController extends Controller
{
	public function delete(Request $request, $nomor_kasus)
	{	
		$tindakan = Tindakan::find($request->id);
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();

		if(!empty($tindakan->tagihan_detail_id))
		{
			$tagihanDetail = TagihanDetail::find($tindakan->tagihan_detail_id);
			$tagihanDetail->delete();

			$nominal_negatif = $tindakan->price * -1;


			$tagihan = app('App\Http\Controllers\Kasus\Tagihan\EditController')->edit_bill($tagihanDetail->kasus_tagihan_id,$nominal_negatif);
		}


		$tindakan->delete();


		$status = 1;
		$message = 'Tindakan berhasil dihapus!';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'delete','tindakan',$tindakan->id);

		return back()
		->with('active_nav','tindakan')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}
}
