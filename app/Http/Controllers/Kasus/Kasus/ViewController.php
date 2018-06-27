<?php

namespace App\Http\Controllers\Kasus\Kasus;

use App\Models\FrontOffice\InsuranceCompany;
use App\Models\Kasus\Identitas;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Tindakan;
use App\Models\Nutrition\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Hospital\User;
use App\Models\Nutrition\Diet;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    	public function index($nomor_kasus)
    	{
            $kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
            $data['sidebar_active'] = '';
            $data['kasus'] = $kasus;
    		return view('kasus.home.home',$data);
    	}

    	public function datamedis($nomorKasus)
    	{
    	    $kasus = Kasus::where('nomor_kasus', $nomorKasus)->with('lokasi')->first();
    	    $identitas = Identitas::where('kasus_id', $kasus->id)->with('insurance')->first();
    	    $pharmacies = json_decode(app('App\Http\Controllers\Apotek\Pharmacy\ReadController')->getAll());

            $data['kasus'] = $kasus;
    	    $data['identitas'] = $identitas;
    	    $data['nomor_kasus'] = $nomorKasus;
    	    $data['insurances'] = InsuranceCompany::all();
            $data['nurses'] = User::where('profesi', '=', 2)->get();
            $data['orders'] = Order::where('kasus_id', $kasus->id)->get();
            $data['diets'] = Diet::all();
    	    $data['pharmacies'] = $pharmacies->data;
    	    $data['cppts'] = app('App\Http\Controllers\Kasus\CPPT\ReadController')->fetchAllCPPT($nomorKasus);
    	    $data['diagnosis'] = app('App\Http\Controllers\Kasus\Diagnosis\ReadController')->fetchAllDiagnosis($nomorKasus);
            $data['tindakan'] = app('App\Http\Controllers\Kasus\Tindakan\ReadController')->fetchAllTindakan($nomorKasus);
    	    $data['lokasi'] = app('App\Http\Controllers\Kasus\Lokasi\ReadController')->fetchAllLokasi($nomorKasus);
            $data['resep'] = app('App\Http\Controllers\Kasus\Resep\ReadController')->fetchAllResep($nomorKasus);
            $data['sidebar_active'] = 'datamedis';
            return view(' kasus.datamedis.index', $data);
    	}

}
