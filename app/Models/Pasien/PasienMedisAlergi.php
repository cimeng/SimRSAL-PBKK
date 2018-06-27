<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class PasienMedisAlergi extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'patients_medical_allergy';
}
