<?php

namespace App\Http\Controllers\Kasus\Identitas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Identitas;
use App\Models\Kasus\Kasus;
use Illuminate\Support\Facades\Session;

class EditController extends Controller
{
    public function updateIdentitas(Request $request, $nomorKasus) {


        $kasus = Kasus::where('nomor_kasus', $nomorKasus)->first();
        $identitas = Identitas::where('kasus_id', $kasus->id)->first();
        $identitas->nama = $request->input('nama');
        $identitas->alamat = $request->input('alamat');
        $identitas->no_identitas = $request->input('ktp');
        $identitas->tanggal_lahir = $request->input('tanggal-lahir');
        $identitas->jenis_kelamin = $request->input('jenis-kelamin');
        $identitas->pekerjaan = $request->input('pekerjaan');
        $identitas->no_hp = $request->input('hp');
        $identitas->asuransi = $request->input('id-asuransi');
        $identitas->save();

        $status = 1;
        $message = 'Identitas berhasil diubah!';
        $title = 'Berhasil!';


        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
        ->create($kasus->id,'edit','identitas',$identitas->id);



        return back()
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }


    public function updateIdentitasMedis(Request $request, $nomorKasus) {
        $kasus = Kasus::where('nomor_kasus', $nomorKasus)->first();
        $identitas = Identitas::where('kasus_id', $kasus->id)->first();
        $identitas->tinggi_badan = $request->input('tinggi-badan');
        $identitas->berat_badan= $request->input('berat-badan');
        $identitas->alergi= $request->input('alergi');
        $identitas->save();

        $status = 1;
        $message = 'Identitas medis berhasil diubah!';
        $title = 'Berhasil!';

        
        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
        ->create($kasus->id,'edit','identitas',$identitas->id);


        return back()
        ->with('message', $message)
        ->with('title',$title)
        ->with('status', $status);
    }
}
