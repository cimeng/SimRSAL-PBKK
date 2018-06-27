<?php

namespace App\Http\Controllers\Kasus\Resep;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Diagnosis;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Lokasi;
use App\Models\Kasus\Resep;
use App\Models\Kasus\ResepDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CreateController extends Controller
{
    public function createNewResep($nomorKasus, Request $request) {

        $kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();
        $pasienId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('pasien_id')->first();

        $kategoriObat = $request->input('kategori-obat');
        $tipeObat = $request->input('tipe-obat');
        $jumlahObat = $request->input('jumlah-obat');
        $namaObat = $request->input('nama-obat');
        $racikan = $request->input('racikan');
        $aturanObat = $request->input('aturan-obat');
        $idObat = $request->input('id-obat');

        $resep = new Resep();
        $resep->kasus_id = $kasusId;
        $resep->created_by = Auth::user()->id;
        $resep->save();

        $resepId = $resep->id;

        $size = sizeof($namaObat);

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


        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
        ->create($kasusId,'create','resep',$resep->id);

        $status = 1;
        $message = 'Resep berhasil dibuat!';
        $title = 'Berhasil!';


        return back()
        ->with('active_nav','resep')
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }
}
