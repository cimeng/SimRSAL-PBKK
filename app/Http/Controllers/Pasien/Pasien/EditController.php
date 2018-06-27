<?php

namespace App\Http\Controllers\Pasien\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;

class EditController extends Controller
{
    	public function relatives($user, $target, $relation)
    	{
    		$pasien = Pasien::find($user);
    		$pasien->relatives_id = $target;
    		$pasien->relatives_type = $relation;
    		$pasien->save();
    	}

    	public function edit($pasien)
    	{
    		$edited_pasien = Pasien::find($pasien['id']);
    		$edited_pasien->name = $pasien['name'];
    		$edited_pasien->gender = $pasien['gender'];
    		$edited_pasien->marriage = $pasien['marriage'];
    		$edited_pasien->place_of_birth = $pasien['birthplace'];
    		$edited_pasien->date_of_birth = $pasien['birthdate'];
    		$edited_pasien->address = $pasien['address'];
    		$edited_pasien->city = $pasien['city'];
    		$edited_pasien->district = $pasien['district'];
    		$edited_pasien->phone = $pasien['phone'];
    		$edited_pasien->ktp = $pasien['ktp'];
    		$edited_pasien->type = $pasien['type'];
    		$edited_pasien->treatment_class = $pasien['class'];
    		$edited_pasien->job = $pasien['occupation'];
            $edited_pasien->photo_ori = $pasien['avatar'];
            $edited_pasien->photo_thumb = $pasien['avatar_thumb'];
    		$edited_pasien->save();


    		/*apakah tipe asuransi*/
    		if($pasien['type'] == 1 or $pasien['type']==2)
    		{
    			$asuransi = app('App\Http\Controllers\Pasien\PasienAsuransi\EditController')
    			->edit($pasien);
    		}
    		else if($pasien['type'] == 3)
    		{
    			$kerjasama = app('App\Http\Controllers\Pasien\PasienPerusahaanKerjasama\EditController')
    			->edit($pasien);
    		}

    		return array(
				'pasien' => $pasien,
				'status' => 1
			);
    	}
}
