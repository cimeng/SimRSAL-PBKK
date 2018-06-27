<?php

namespace App\Http\Controllers\Kasus\Resep;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Diagnosis;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Resep;
use App\Models\Kasus\ICD10;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warehouse\Items;

class ReadController extends Controller
{
    public function fetchAllResep($nomorKasus) {

        $kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();

        $resep = Resep::where('kasus_id', $kasusId)->with(['resepDetail'])->orderBy('created_at','desc')->get();
        return $resep;
    }

    public function search(Request $request)
    {
    		$apotek_id = $request->apotek_id;
    		$keyword = $request->keyword;

    		$items = Items::search($keyword)->paginate(10);
    		return json_encode($items);


    }


    public function get($nomor_kasus,$id) {
        $resep = Resep::where('id',$id)->with(['resepDetail'])->first();
        return json_encode($resep);
    }
}
