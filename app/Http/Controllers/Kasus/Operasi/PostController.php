<?php

namespace App\Http\Controllers\Kasus\Operasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;

class PostController extends Controller
{
	public function permintaan($nomor_kasus, Request $request)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
		$transaksi_operasi = app('App\Http\Controllers\KamarOperasi\Transaksi\PostController')->daftarOperasi($kasus->pasien_id,$kasus->id);

		$transaksi_global = app('App\Http\Controllers\Kasus\OperasiPermintaan\CreateController')->create($kasus->id,$transaksi_operasi->id);

		$status = 1;
		$message = 'Pasien berhasil didaftarkan';
		$title = 'Berhasil!';

		return back()
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}
}
