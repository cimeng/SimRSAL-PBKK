<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class AlatApgar extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'alat_apgar';
	
	public function creator()
	{
		return $this->hasOne('App\User','id','created_by');
	}
}
