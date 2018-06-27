<?php

namespace App\Http\Controllers\Kasus\Lokasi;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Diagnosis;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Lokasi;
use App\Models\Kasus\ICD10;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReadController extends Controller
{
    public function fetchAllLokasi($nomorKasus) {

        $kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();

        $lokasi = Lokasi::where('kasus_id', $kasusId)->with(['creator'])->orderBy('created_at','desc')->get();
        return $lokasi;

    }

}
