<?php

namespace App\Http\Controllers\Pasien\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function index(){
        $data['totalPasien'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->getTotalPasien();
        $data['pasienBaruCount'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->getNewPasien();
        $data['kunjungan'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->getKunjungan();
        $data['pasienBaru'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->getPasienTerbaru();
        $data['tempatTransaksi'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->getTempatTransaksi();
        $data['pasienType'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->getJenisPasien();
        // dd($data);
        return view('pasien.index', $data);
    }

    public function new(){
        $data['asuransi'] = app('App\Http\Controllers\Pasien\Asuransi\ReadController')->getAll();
        $data['perusahaan_kerjasama'] = app('App\Http\Controllers\Pasien\PerusahaanKerjasama\ReadController')->getAll();
        return view('pasien.baru',$data);
    }

    public function profile($id)
    {
        $data = app('App\Http\Controllers\Pasien\Pasien\ReadController')->profile($id);
        return view('pasien.profile',$data);
    }

    public function edit($id)
    {
        $data['asuransi'] = app('App\Http\Controllers\Pasien\Asuransi\ReadController')->getAll();
        $data['perusahaan_kerjasama'] = app('App\Http\Controllers\Pasien\PerusahaanKerjasama\ReadController')->getAll();

        $data['pasien'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->profile($id);
        return view('pasien.edit',$data);
    }

    public function editKerabat($id)
    {
        $data['pasien'] = app('App\Http\Controllers\Pasien\Pasien\ReadController')->profile($id);
        if(empty($data['pasien']['identitas']->relatives_id))
        {
            $wali = app('App\Http\Controllers\Pasien\PasienWali\CreateController')->create($data['pasien']['identitas']->id);
            $data['wali'] = $wali;
        }
        else
        {
            $data['wali'] = app('App\Http\Controllers\Pasien\PasienWali\ReadController')->get($data['pasien']['identitas']->relatives_id);
        }


        return view('pasien.edit-kerabat',$data);
    }

    public function listPasien()
    {
        return view('pasien.list-pasien');
    }
}
