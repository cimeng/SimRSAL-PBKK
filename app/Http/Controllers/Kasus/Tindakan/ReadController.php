<?php

namespace App\Http\Controllers\Kasus\Tindakan;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Diagnosis;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Tindakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReadController extends Controller
{
    public function fetchAllTindakan($nomorKasus) {

        $kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();
        $tindakan = Tindakan::where('kasus_id', $kasusId)->with(['creator', 'icd9'])->orderBy('created_at', 'desc')->get();
        return $tindakan;
    }


	public function get($nomor_kasus, $id)
	{
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
		$tindakan = Tindakan::find($id);

		if($kasus->id != $tindakan->kasus_id)
		{
			return abort(404);
		}
		else
		return json_encode($tindakan);
	}
}
