<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Model;

class AlamatKota extends Model
{
    	protected $connection = 'patients';
    	protected $table = 'address_city';
}
