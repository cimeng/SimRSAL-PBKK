<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ICD9 extends Model
{
	protected $connection = 'kasus';
	protected $table = 'icd_9';
	use Searchable;

	public function searchableAs()
	{
		return 'icd_10';
	}
}
