<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;


class User extends Authenticatable
{
    protected $connection = 'mysql';
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profesi_detail() {
        return $this->hasOne('App\Models\Hospital\Profesi', 'id', 'profesi');
    }
    public function searchableAs()
    {
        return 'hospital_users';
    }
}
