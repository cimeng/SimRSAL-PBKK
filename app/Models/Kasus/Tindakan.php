<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tindakan extends Model
{
    protected $connection = 'kasus';
    protected $table = 'tindakan';
    protected $appends = ['tanggal'];


    public function creator() {
        return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
    }

    public function icd9() {
        return $this->hasOne('App\Models\Kasus\ICD9', 'id', 'icd_9');
    }

    public function getTanggalAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
    }
}
