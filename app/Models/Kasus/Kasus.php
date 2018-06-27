<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
use App\Models\Kasus\Kolaborator;

class Kasus extends Model
{
	protected $connection = 'kasus';
	protected $table = 'kasus';
	protected $appends = ['end_at_tanggal'];

	public function lokasi()
	{
		return $this->hasOne('App\Models\Kasus\Lokasi','kasus_id','id')->latest();
	}

	public function transaksi_global_detail()
	{
		return $this->hasOne('App\Models\Hospital\TransaksiMasukDetail','id','transaksi_masuk_detail_id');
	}

	public function tagihan()
	{
		return $this->hasOne('App\Models\Kasus\Tagihan','kasus_id','id');
	}

	public function dpjp_detail()
	{
		return $this->hasOne('App\User','id','dpjp');
	}

	public function pasien()
	{
		return $this->hasOne('App\Models\Pasien\Pasien','id','pasien_id');
	}

	public function identitas()
	{
		return $this->hasOne('App\Models\Kasus\Identitas','kasus_id','id');
	}

	public function end_by_creator()
	{
		return $this->hasOne('App\Models\Hospital\User','id','end_by');
	}

	public function getEndAtTanggalAttribute() {
		return Carbon::parse($this->attributes['end_at'])->format('d F Y H:i');
	}

	public function getMyRoleAttribute()
	{
		$kolaborator = Kolaborator::where('user_id',Auth::user()->id)->where('kasus_id',$this->id)->first();
		return $kolaborator;
	}
}
