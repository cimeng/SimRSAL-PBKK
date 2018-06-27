<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class PasienPerusahaanKerjasama extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'patients_cooperation';

    	public function company()
	{
		return $this->hasOne('App\Models\Pasien\PerusahaanKerjasama', 'id', 'company_id');
	}


}
