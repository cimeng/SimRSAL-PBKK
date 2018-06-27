<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class TransaksiUtama extends Model
{
    	protected $connection = 'mysql';
	protected $table = 'transaksi_utama';


	public function modul()
	{
		return $this->hasOne('App\Models\Hospital\Modul','id','modul_id');
	}

	public function transaksi_masuk()
	{
		return $this->hasOne('App\Models\Hospital\TransaksiMasuk','id','transaksi_masuk_id');
	}

	public function transaksi_penunjang()
	{
		return $this->hasMany('App\Models\Hospital\TransaksiPenunjang','transaksi_utama_id','id');
	}
}
