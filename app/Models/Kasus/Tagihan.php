<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'tagihan';


	public function detail()
	{
		return $this->hasMany('App\Models\Kasus\TagihanDetail','kasus_tagihan_id','id');
	}
}
