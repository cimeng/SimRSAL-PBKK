<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class PasienWali extends Model
{

	protected $connection = 'patients';
	protected $table = 'patients_guardian';


	public function pasien()
	{
		return $this->hasOne('App\Models\Pasien\Pasien', 'id', 'pasien_id');
	}

    	public function alamat_kota()
	{
		return $this->hasOne('App\Models\Pasien\AlamatKota', 'id', 'city');
	}

	public function alamat_kecamatan()
	{
		return $this->hasOne('App\Models\Pasien\AlamatKecamatan', 'id', 'district');
	}

	public function wali()
	{
		return $this->hasOne('App\Models\Pasien\Pasien', 'relatives_id', 'id');
	}

	public function getAgeAttribute()
	{
		return Carbon::parse($this->attributes['birthdate'])->age;
	}

	public function getJenisKelaminAttribute()
	{
		if($this->gender)
			return 'Laki laki';
		else
			return 'Perempuan';
	}
}
