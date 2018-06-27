<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class User extends Model
{
	use Searchable;

	protected $connection = 'users';
	protected $table = 'users';
	

	public function searchableAs()
	{
		return 'hospital_users';
	}
	
    public function profesi_detail() {
        return $this->hasOne('App\Models\Hospital\Profesi', 'id', 'profesi');
    }

}
