<?php

namespace App\Http\Controllers\Kasus\Histori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;

class ViewController extends Controller
{
    	public function index($nomor_kasus)
    	{
    		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$data['kasus'] = $kasus;
       	$data['sidebar_active'] = 'histori';
       	$data['histori'] = Kasus::where('pasien_id',$kasus->pasien_id)->orderBy('id','desc')->get();

    		return view('kasus.histori.index',$data);
    	}
}
