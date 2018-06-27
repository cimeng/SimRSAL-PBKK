<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'insurance_company';
}
