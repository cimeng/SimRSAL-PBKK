<?php

namespace App\Http\Controllers\Kasus\Operasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\OperasiPermintaan;

class ViewController extends Controller
{
    	public function index($nomor_kasus)
    	{

    		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$data['kasus'] = $kasus;
       	$data['sidebar_active'] = 'operasi';
       	$data['permintaan'] = OperasiPermintaan::where('kasus_id',$kasus->id)->orderBy('id','desc')->get();

    		return view('kasus.operasi.index',$data);
    	}
}
