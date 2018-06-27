<?php

namespace App\Http\Controllers\Kasus\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;

class ViewController extends Controller
{
    	public function index($nomor_kasus)
    	{
    		$data['sidebar_active'] = 'pengaturan';
    		$data['kasus'] = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		return view('kasus.pengaturan.index',$data);
    	}
}
