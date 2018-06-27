<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class TransaksiMasukDetail extends Model
{
	protected $connection = 'mysql';
	protected $table = 'transaksi_masuk_detail';

	public function modul()
	{
		return $this->hasOne('App\Models\Hospital\Modul','id','modul_id');
	}

	public function transaksi_masuk()
	{
		return $this->hasOne('App\Models\Hospital\TransaksiMasuk','id','transaksi_masuk_id');
	}
}
