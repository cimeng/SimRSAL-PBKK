<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ToDo extends Model
{
	protected $connection = 'kasus';
	protected $table = 'to_do';
	protected $appends = ['tanggal'];

	public function getTanggalAttribute() {
		return Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
	}

	public function creator() {
		return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
	}

	public function worker() {
		return $this->hasOne('App\Models\Hospital\User', 'id', 'done_by');
	}
}
