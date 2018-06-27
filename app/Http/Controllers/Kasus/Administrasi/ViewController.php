<?php

namespace App\Http\Controllers\Kasus\Administrasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;

class ViewController extends Controller
{
	public function index($nomor_kasus)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
		$data['kasus'] = $kasus;
		$data['sidebar_active'] = 'administrasi';
		$data['current_transaksi_utama'] = $kasus->transaksi_global_detail;
		

		return view('kasus.administrasi.index',$data);
	}
}
