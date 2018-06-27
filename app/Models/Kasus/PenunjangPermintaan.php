<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use App\Models\Radiology\Transaction as TransaksiRadiologi;
use App\Models\LabPK\Transaksi as TransaksiLabPK;
use Carbon\Carbon;

class PenunjangPermintaan extends Model
{
	protected $connection = 'kasus';
	protected $table = 'penunjang_permintaan';

	public function getTransaksiAttribute()
	{
		if($this->modul_id == 6)
			$transaksi = TransaksiRadiologi::find($this->transaksi_id);
		elseif($this->modul_id == 10)
			$transaksi = TransaksiLabPK::find($this->transaksi_id);

		return $transaksi;
	}

	public function creator()
	{
		return $this->hasOne('App\User','id','created_by');
	}



}
