<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class OperasiPermintaan extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'operasi_permintaan';


	public function transaksi()
	{
		return $this->hasOne('App\Models\KamarOperasi\Transaksi','id','transaksi_id');
	}

	public function creator()
	{
		return $this->hasOne('App\User','id','created_by');
	}
}
