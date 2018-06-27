<?php

namespace App\Http\Controllers\Kasus\AlatBantu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;

class ViewController extends Controller
{
    	public function index($nomor_kasus)
    	{
    		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$data['kasus'] = $kasus;
       	$data['sidebar_active'] = 'alat';

    		return view('kasus.alatbantu.index',$data);
    	}
}
