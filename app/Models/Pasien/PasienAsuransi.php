<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class PasienAsuransi extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'patients_insurance';

	public function company()
	{
		return $this->hasOne('App\Models\Pasien\Asuransi', 'id', 'company_id');
	}

}
