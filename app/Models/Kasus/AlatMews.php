<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class AlatMews extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'alat_mews';

	
	public function creator()
	{
		return $this->hasOne('App\User','id','created_by');
	}
}
