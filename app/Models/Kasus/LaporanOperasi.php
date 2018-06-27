<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class LaporanOperasi extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'kasus_operasi';
}
