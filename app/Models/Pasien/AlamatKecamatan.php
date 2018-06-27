<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class AlamatKecamatan extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'address_district';
}
