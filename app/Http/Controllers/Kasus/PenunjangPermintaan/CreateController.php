<?php

namespace App\Http\Controllers\Kasus\PenunjangPermintaan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Radiology\Transaction\CreateController as CreateRadiologi;
use App\Http\Controllers\LabPK\Transaksi\CreateController as CreateLabPK;
use App\Models\Kasus\PenunjangPermintaan;
use Auth;

class CreateController extends Controller
{
	protected $createRadiologi;
	protected $createLabPK;

	public function __construct(CreateRadiologi $createRadiologi, CreateLabPK $createLabPK)
	{
		$this->createRadiologi = $createRadiologi;
		$this->createLabPK = $createLabPK;
	}


	public function radiologi($kasus, $services)
	{
		//get lokasi
		$lokasi = $kasus->lokasi->lokasi;

		//buat permintaan
		$permintaan = new PenunjangPermintaan;
		$permintaan->kasus_id = $kasus->id;
		$permintaan->modul_id = 6;
		$permintaan->created_by = Auth::user()->id;
		$permintaan->save();

		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'create','penunjang-radiologi',$permintaan->id);

		//buat transaksi di radiologi
		$transaksi = $this->createRadiologi->createPermintaan($services,$lokasi, $kasus->pasien_id,$kasus->id);


		//update permintaanPenunjang berdasarkan transaksi yang didapet di radiologi
		$permintaan->transaksi_id = $transaksi;
		$permintaan->save();

		return $permintaan;
	}

	public function labpk($kasus, $services,$jam_sampling)
	{
		//get lokasi
		$lokasi = $kasus->lokasi->lokasi;

		//buat permintaan
		$permintaan = new PenunjangPermintaan;
		$permintaan->kasus_id = $kasus->id;
		$permintaan->modul_id = 10;
		$permintaan->created_by = Auth::user()->id;
		$permintaan->save();

		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'create','penunjang-labpk',$permintaan->id);

		//buat transaksi di radiologi
		$transaksi = $this->createLabPK->createPermintaan($services,$lokasi, $kasus->pasien_id,$kasus->id,$jam_sampling);

		//update permintaanPenunjang berdasarkan transaksi yang didapet di radiologi
		$permintaan->transaksi_id = $transaksi->id;
		$permintaan->save();

		return $permintaan;
	}
}
