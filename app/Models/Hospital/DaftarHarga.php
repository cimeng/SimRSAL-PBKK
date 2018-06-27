<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class DaftarHarga extends Model
{
	protected $connection = 'mysql';
	protected $table = 'daftar_harga';
	use Searchable;

	public function searchableAs()
	{
		return 'hospital_daftar_harga';
	}
}
