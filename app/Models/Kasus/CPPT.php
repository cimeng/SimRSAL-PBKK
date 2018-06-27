<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CPPT extends Model
{
    protected $connection = 'kasus';
    protected $table = 'cppt';
    protected $appends = ['tanggal'];

    public function creator() {
        return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
    }

    public function getTanggalAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
    }
}
