<?php

namespace App\Http\Controllers\Kasus\Resep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Resep;
use App\Models\Kasus\ResepDetail;
use App\Models\Kasus\Kasus;

class EditController extends Controller
{
	public function editResep(Request $request,$nomorKasus)
	{
		$resepId = $request->id;

		$kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();
		$pasienId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('pasien_id')->first();

		$kategoriObat = $request->input('kategori-obat');
		$tipeObat = $request->input('tipe-obat');
		$jumlahObat = $request->input('jumlah-obat');
		$namaObat = $request->input('nama-obat');
		$racikan = $request->input('racikan');
		$aturanObat = $request->input('aturan-obat');
		$idObat = $request->input('id-obat');

		$resep = Resep::find($resepId);

		$size = sizeof($namaObat);

		$this->deleteOldResepDetail($resepId);

		for($i = 0; $i < $size; $i++) {
			$resepDetail = new ResepDetail();
			$resepDetail->kasus_resep_id = $resepId;
			$resepDetail->obat_name = $namaObat[$i];
			$resepDetail->kategori = $kategoriObat[$i];
			$resepDetail->type = $tipeObat[$i];
			$resepDetail->racikan = $racikan[$i];
			$resepDetail->jumlah = $jumlahObat[$i];
			$resepDetail->aturan = $aturanObat[$i];
			$resepDetail->obat_id = $idObat[$i];
			$resepDetail->save();

		}

		$request->merge(['kasus_id' => $kasusId, 'resep_id' => $resepId, 'pasien_id' => $pasienId]);

		$tryReturn = app('App\Http\Controllers\Apotek\TransaksiObat\CreateController')->createResep($request);

		$status = 1;
		$message = 'Resep berhasil diubah!';
		$title = 'Berhasil!';



		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasusId,'edit','resep',$resep->id);


		return back()
		->with('active_nav','resep')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);

	}

	private function deleteOldResepDetail($resepId)
	{
		$reseps = ResepDetail::where('kasus_resep_id',$resepId);
		$reseps->delete();
	}
}
