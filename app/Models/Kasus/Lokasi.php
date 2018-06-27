<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lokasi extends Model
{
	protected $connection = 'kasus';
	protected $table = 'lokasi';
	protected $appends = ['tanggal'];

	public function getTanggalAttribute() {
		return Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
	}

	public function creator() {
		return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
	}
}
