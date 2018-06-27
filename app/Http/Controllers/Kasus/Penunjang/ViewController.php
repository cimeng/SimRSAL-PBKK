<?php

namespace App\Http\Controllers\Kasus\Penunjang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Http\Controllers\Kasus\Penunjang\ReadController as PenunjangRead;
use App\Http\Controllers\Kasus\PenunjangPermintaan\ReadController as PenunjangPermintaanRead;
use App\Http\Controllers\Radiology\Service\ReadController as RadiologiServices;
use App\Http\Controllers\LabPK\LayananKategori\ReadController as LabPKServices;

class ViewController extends Controller
{
	protected $readPenunjang;
	protected $readPermintaan;
	protected $servicesRadiologi;
    protected $servicesLabPK;

	public function __construct(PenunjangRead $readPenunjang, PenunjangPermintaanRead $readPermintaan, RadiologiServices $servicesRadiologi,  LabPKServices $servicesLabPK)
	{
		$this->readPenunjang = $readPenunjang;
		$this->readPermintaan = $readPermintaan;
		$this->servicesRadiologi = $servicesRadiologi;
        $this->servicesLabPK = $servicesLabPK;
	}


   public function index($nomor_kasus)
   {
      $kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
      $data['kasus'] = $kasus;
      $data['penunjang'] = $this->readPenunjang->get($kasus->id);
      $data['permintaan'] = $this->readPermintaan->get($kasus->id);

      $radiologi = $this->servicesRadiologi->getAll();
      $data['radiologi'] = json_decode($radiologi)->data;
      $data['labpk'] = $this->servicesLabPK->getAll();

      $data['sidebar_active'] = 'penunjang';

      return view('kasus.penunjang.index',$data);
  }
}
