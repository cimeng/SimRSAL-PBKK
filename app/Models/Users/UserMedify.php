<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
// use Illuminate\Database\Eloquent\SoftDeletes;

class UserMedify extends Model
{
	use Searchable;
    // use SoftDeletes;
	protected $connection = 'users';
	protected $table = 'users';

	public function pegawai(){
		return $this->hasMany('App\Models\Kepegawaian\Pegawai','id', 'user_id');
	}
}