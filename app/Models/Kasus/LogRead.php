<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class LogRead extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'kasus_log_read';
}
