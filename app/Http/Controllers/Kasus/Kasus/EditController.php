<?php

namespace App\Http\Controllers\Kasus\Kasus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Identitas;
use App\Models\Kasus\Kasus;
use App\Models\Hospital\TransaksiMasuk as GlobalTransaksiMasuk;
use App\Models\Hospital\TransaksiMasukDetail as GlobalTransaksiMasukDetail;

use App\Models\IGD\Transaksi as IGDTransaksi;
use App\Models\RawatInap\Transaksi as RawatInapTransaksi;
use App\Models\RawatInap\TempatTidur;


use Illuminate\Support\Facades\Session;

class EditController extends Controller
{
    public function updateIdentitas(Request $request, $nomorKasus) {
        $kasus = Kasus::where('nomor_kasus', $nomorKasus)->first();
        $identitas = Identitas::where('kasus_id', $kasus->id)->first();
        $identitas->nama = $request->input('nama');
        $identitas->save();

        return back()->with('message', 'Identitas Pasien berhasil diubah!');
    }

	public function changeActiveTransaksiMasukDetail($kasus_id,$transaksi_masuk_detail_id)
	{
		#mencari kasus
		$kasus = Kasus::find($kasus_id);
		
		#ngambil id yang lama
		$old_id = $kasus->transaksi_masuk_detail_id;

		#mengupdate pasien menjadi ke yang baru
		$kasus->transaksi_masuk_detail_id=$transaksi_masuk_detail_id;
		$kasus->save();


		#menghapus pasien dari modul yang lama
		#jadi pasien pindah dulu ke transaksi yang baru, baru yang lama dihapus dari daftar
		#mungkin terjadi kesalahan jadi yang lama blm diapus
		$old_transaksi = $this->removeFromPrev($old_id);

		return $kasus;
	}

	private function removeFromPrev($old_id)
	{
		#cari transaksi detail yang lama
		$old_transaksi = GlobalTransaksiMasukDetail::find($old_id);
		#dicari sesuai modul_id
		#didalem setiap if ada method untuk menghapus dari bookingan kamar, masing masing beda
		if($old_transaksi->modul_id == 8)
		{
			$igd = IGDTransaksi::find($old_transaksi->transaksi_lokal_id);
			$igd->delete();
		}
		elseif($old_transaksi->modul_id == 3)
		{
			$rawatinap = RawatInapTransaksi::find($old_transaksi->transaksi_lokal_id);
			$bed = TempatTidur::find($rawatinap->tempat_tidur_id);
			if(!empty($bed))
			{
				$bed->transaksi_id = NULL;
				$bed->save();
			}
		}

	   return $old_transaksi;
	}
}
