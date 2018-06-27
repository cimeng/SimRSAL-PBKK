<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Profesi extends Model
{
	use Searchable;
    // use SoftDeletes;
	protected $connection = 'profesi';
	protected $table = 'profession';

	public function pegawai(){
		return $this->hasMany('App\Models\Kepegawaian\Pegawai','id', 'jabatan_id');
	}
}
