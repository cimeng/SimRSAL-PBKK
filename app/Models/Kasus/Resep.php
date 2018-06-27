<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Resep extends Model
{
    protected $dates = ['deleted_at'];
  	protected $connection = 'kasus';
	protected $table = 'resep';
    protected $appends = ['tanggal'];

    use SoftDeletes;

	public function resepDetail() {
	    return $this->hasMany('App\Models\Kasus\ResepDetail', 'kasus_resep_id', 'id');
    }

    public function doctor() {
        return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
    }

    public function getTanggalAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
    }

}
