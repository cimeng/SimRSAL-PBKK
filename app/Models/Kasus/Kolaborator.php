<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class Kolaborator extends Model
{
	protected $connection = 'kasus';
	protected $table = 'kolaborator';


	public function user() {
		return $this->hasOne('App\Models\Hospital\User', 'id', 'user_id');
	}
}
