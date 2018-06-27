<?php

namespace App\Http\Controllers\Kasus\Resep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Resep;
use App\Models\Kasus\Kasus;

class PostController extends Controller
{
	public function printResep($nomor_kasus, $id)
	{
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
		$resep = Resep::find($id);
		$kasusId = $resep->kasus_id;
		$data['resep'] = $resep;
		$data['kasus'] = $kasus;
		if($kasus->id != $resep->kasus_id)
		{
			return abort(404);
		}
		else
		{
			$log = app('App\Http\Controllers\Kasus\Log\CreateController')
			->create($kasusId,'print','resep',$resep->id);
			return view('kasus.datamedis.content.resep.print',$data);
		}
	}
}
