<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Identitas extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'identitas';
	protected $appends = ['age', 'tanggal'];


	public function getAgeAttribute() {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age;
    }

    public function getTanggalAttribute() {
        return Carbon::parse($this->attributes['tanggal_lahir'])->format('d F Y');
    }

    public function insurance() {
	    return $this->hasOne('App\Models\Pasien\Asuransi', 'id', 'asuransi');
    }

    public function getAlergiArrayAttribute($value)
    {
        return  array_filter(explode(",",$this->attributes['alergi']));
    }

    public function getGenderAttribute()
    {
        if($this->jenis_kelamin == 'L')
            $gender = 'Laki laki';
        else
            $gender = 'Perempuan';

        return $gender;
    }
}
