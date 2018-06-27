<?php

namespace App\Http\Controllers\Kasus\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use Carbon\Carbon;
use App\Models\IGD\Transaksi as IGDTransaksi;
use App\Models\RawatJalan\Transaksi as IRJTransaksi;
use App\Models\RawatInap\Transaksi as RawatInapTransaksi;
use App\Models\RawatInap\TempatTidur;
use Auth;

class PostController extends Controller
{
	public function tutupKasus($nomor_kasus)
	{
		try{
			$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
			$kasus->end = 1;
			$kasus->end_by = Auth::user()->id;
			$kasus->end_at = Carbon::now();
			$kasus->save();
			$remove = $this->removePasienFromAnyTransaction($kasus->id);


			$status = 1;
			$message = 'Kasus berhasil ditutup!';
			$title = 'Berhasil!';

			$log = app('App\Http\Controllers\Kasus\Log\CreateController')
			->create($kasus->id,'close','kasus',0);


			return back()
			->with('active_nav','pengaturan')
			->with('message', $message)
			->with('title',$title)
			->with('status', $status);

		}
		catch (\Exception $e) {
			return $e->getMessage();
		}

	}

	public function removePasienFromAnyTransaction($kasus_id)
	{
          //remove IGD

		$igd = IGDTransaksi::where('kasus_id',$kasus_id)->get();
		foreach($igd as $item)
		{
			$item_igd = IGDTransaksi::find($item->id);
			$item_igd->delete();
		}

          //delete transaksi
          //remove Rawatinap
          //hapus tempat tidur
		$rawatinap = RawatInapTransaksi::where('kasus_id',$kasus_id)->OrderBy('id','desc')->first();

		$bed = TempatTidur::find($rawatinap->tempat_tidur_id);
		$bed->transaksi_id = NULL;
		$bed->save();

		return 1;
	}
}
