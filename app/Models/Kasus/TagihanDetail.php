<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class TagihanDetail extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'tagihan_detail';

	
    public function creator() {
        return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
    }
}
