<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class AlatPoedji extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'alat_poedji';

	public function creator()
	{
		return $this->hasOne('App\User','id','created_by');
	}
}
