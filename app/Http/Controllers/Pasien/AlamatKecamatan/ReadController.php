<?php

namespace App\Http\Controllers\Pasien\AlamatKecamatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\AlamatKecamatan;

class ReadController extends Controller
{
    	public function get($id)
    	{
    		$kecamatan = AlamatKecamatan::where('city_id',$id)->get();
    		return json_encode($kecamatan);
    	}
}
