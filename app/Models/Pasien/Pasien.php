<?php

namespace App\Models\Pasien;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Pasien extends Model
{	
	use Searchable;
	protected $connection = 'patients';
	protected $table = 'patients';

	public function searchableAs()
	{
		return 'hospital_patients';
	}

	public function pasien_asuransi()
	{
		return $this->hasOne('App\Models\Pasien\PasienAsuransi', 'patients_id', 'id');
	}

	public function pasien_medis()
	{
		return $this->hasOne('App\Models\Pasien\PasienMedis', 'patients_id', 'id');
	}

	public function pasien_kerjasama()
	{
		return $this->hasOne('App\Models\Pasien\PasienPerusahaanKerjasama', 'patients_id', 'id');
	}

	public function pasien_medis_alergi()
	{
		return $this->hasOne('App\Models\Pasien\PasienMedisAlergi', 'patients_id', 'id');
	}

	public function alamat_kota()
	{
		return $this->hasOne('App\Models\Pasien\AlamatKota', 'id', 'city');
	}

	public function alamat_kecamatan()
	{
		return $this->hasOne('App\Models\Pasien\AlamatKecamatan', 'id', 'district');
	}

	public function kerabat()
	{
		return $this->hasOne('App\Models\Pasien\Pasien', 'id', 'relatives_id');
	}

	public function wali()
	{
		return $this->hasOne('App\Models\Pasien\PasienWali', 'id', 'relatives_id');
	}

	public function getAgeAttribute()
	{
		return Carbon::parse($this->attributes['date_of_birth'])->age;
	}

	/*public function getJenisKelaminAttribute()
	{
		if($this->gender)
			return 'Laki laki';
		else
			return 'Perempuan';
	}*/
}
