<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Diagnosis extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'diagnosis';
    protected $appends = ['tanggal'];

    public function creator() {
	    return $this->hasOne('App\Models\Hospital\User', 'id', 'created_by');
    }

    public function icd10() {
	    return $this->hasOne('App\Models\Kasus\ICD10', 'id', 'icd_10');
    }

    public function getTanggalAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y');
    }

}
