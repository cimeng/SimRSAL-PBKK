<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ResepDetail extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $connection = 'kasus';
	protected $table = 'resep_detail';
}
