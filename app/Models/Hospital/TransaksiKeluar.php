<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;

class TransaksiKeluar extends Model
{
    	protected $connection = 'mysql';
	protected $table = 'transaksi_keluar';
	
	public function modul()
	{
		return $this->hasOne('App\Models\Hospital\Modul','id','modul_id');
	}

}
