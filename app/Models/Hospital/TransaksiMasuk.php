<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
	protected $connection = 'mysql';
	protected $table = 'transaksi_masuk';

	public function modul()
	{
		return $this->hasOne('App\Models\Hospital\Modul','id','modul_id');
	}

	public function transaksi_utama()
	{
		return $this->hasMany('App\Models\Hospital\TransaksiUtama','transaksi_masuk_id','id');
	}

	public function transaksi_utama_last()
	{
		return $this->hasOne('App\Models\Hospital\TransaksiUtama','transaksi_masuk_id','id')->latest();
	}

	public function transaksi_masuk_detail()
	{
		return $this->hasMany('App\Models\Hospital\TransaksiMasukDetail','transaksi_masuk_id','id');
	}
}
