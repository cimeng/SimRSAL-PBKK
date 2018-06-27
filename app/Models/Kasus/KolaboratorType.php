<?php

namespace App\Models\Kasus;

use Illuminate\Database\Eloquent\Model;

class KolaboratorType extends Model
{
  	protected $connection = 'kasus';
	protected $table = 'kasus_collaborator_type';
}
