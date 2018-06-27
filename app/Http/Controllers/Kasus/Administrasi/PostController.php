<?php

namespace App\Http\Controllers\Kasus\Administrasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Models\RawatInap\Transaksi as TransaksiRawatInap;

class PostController extends Controller
{
    	public function rawatInapDaftar($nomor_kasus)
    	{
    		
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$transaksi = $this->rawatInapBuatPermintaan($nomor_kasus);

		$status = 1;
		$message = 'Pasien berhasil di daftarkan ke rawat inap';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'create','administrasi-rawatinap-daftar',$transaksi->id);

		return back()
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}

	public function rawatInapPindah($nomor_kasus)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$transaksi_masuk_detail_id = $kasus->transaksi_masuk_detail_id;

    		#membuat permintaan baru
    		$transaksi_rawatinap = $this->rawatInapBuatPermintaan($nomor_kasus);



		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'create','administrasi-rawatinap-pindah',$transaksi_rawatinap->id);

    		#redirect ke permintaan tersebut
    		return redirect('rawatinap/transaksi/pendaftaran/ruangan?transaksi_id='.$transaksi_rawatinap->id);
	}

	private function rawatInapBuatPermintaan($nomor_kasus)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$transaksi_masuk_id = $kasus->transaksi_global_detail->transaksi_masuk->id;

    		#buat transaksi detail dulu
		$newTransaksiMasukDetail =  app('App\Http\Controllers\Hospital\Transaksi\CreateController')->createDetail($transaksi_masuk_id,3,1);

		#buat transaksi di rawat inap dan masukin transaksi masuk detail
		$transaksi_rawatinap = new TransaksiRawatInap;
		$transaksi_rawatinap->pasien_id = $kasus->pasien_id;
        	$transaksi_rawatinap->transaksi_masuk_detail_id = $newTransaksiMasukDetail->id;
        	#$transaksi_rawatinap->transaksi_masuk_id = $newTransaksiMasukDetail->id;
		$transaksi_rawatinap->kasus_id = $kasus->id;
		$transaksi_rawatinap->status = 0;
		$transaksi_rawatinap->created_by = 9;
		$transaksi_rawatinap->save();

		#diupdate
		$newTransaksiMasukDetail = app('App\Http\Controllers\Hospital\Transaksi\EditController')->edit($newTransaksiMasukDetail->id,$transaksi_rawatinap->id);

		#disini kasus belum menunjuk ke transaksi masuk detail yang baru terbuat
		#kasus masih menunjuk ke yang lama
		#kasus akan menunjuk nanti ketika di ganti

		return $transaksi_rawatinap;
	}


	/*RAWAT JALAN*/

	public function rawatJalanRujuk($nomor_kasus)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();

		return redirect('rawatjalan/poliklinik/antrian/baru/'.$kasus->pasien_id.'/'.$kasus->id.'?rujuk=1');
	}


	public function igdPindah($nomor_kasus)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();

		return redirect('igd/transaksi/baru/'.$kasus->pasien_id.'/'.$kasus->id);
	}
}
	