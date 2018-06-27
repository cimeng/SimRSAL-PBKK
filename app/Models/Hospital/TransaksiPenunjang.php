<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenunjang extends Model
{
    	protected $connection = 'mysql';
	protected $table = 'transaksi_penunjang';

	public function modul()
	{
		return $this->hasOne('App\Models\Hospital\Modul','id','modul_id');
	}

	public function transaksi_utama()
	{
		return $this->hasOne('App\Models\Hospital\TransaksiUtama','id','transaksi_utama_id');
	}

}
