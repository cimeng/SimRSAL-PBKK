<?php

namespace App\Http\Controllers\Kasus\Diagnosis;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Diagnosis;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\ICD10;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReadController extends Controller
{
	public function fetchAllDiagnosis($nomorKasus) {

		$kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();

		$diagnosis = Diagnosis::where('kasus_id', $kasusId)->with(['creator', 'icd10'])->orderBy('created_at','desc')->get();
		return $diagnosis;
	}

	public function searchDiagnosisByKeyword($keyword) {

		$icd = ICD10::search($keyword)->get();
		return $icd;

	}
}
