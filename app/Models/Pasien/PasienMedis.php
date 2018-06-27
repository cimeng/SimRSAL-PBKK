<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class PasienMedis extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'patients_medical';
}
