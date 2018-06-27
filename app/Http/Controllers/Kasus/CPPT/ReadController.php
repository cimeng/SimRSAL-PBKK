<?php

namespace App\Http\Controllers\Kasus\CPPT;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Kasus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReadController extends Controller
{
	public function fetchAllCPPT($nomorKasus) {

		$kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();

		$cppt = CPPT::where('kasus_id', $kasusId)->orderBy('created_at', 'desc')->get();
		return $cppt;
	}

	public function get($nomor_kasus, $id)
	{
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
		$cppt = CPPT::find($id);

		if($kasus->id != $cppt->kasus_id)
		{
			return abort(404);
		}
		else
		return json_encode($cppt);
	}
}
