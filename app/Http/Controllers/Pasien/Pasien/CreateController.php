<?php

namespace App\Http\Controllers\Pasien\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;

class CreateController extends Controller
{
	public function create($human)
	{
		try{
			$pasien = new Pasien;
			$pasien->name = $human['name'];
			$pasien->gender = $human['gender'];
			$pasien->type = $human['type'];
			$pasien->treatment_class = $human['class'];
			$pasien->marriage = $human['marriage'];
			$pasien->address = $human['address'];
			$pasien->city = $human['city'];
			$pasien->district = $human['district'];
			$pasien->place_of_birth = $human['birthplace'];
			$pasien->date_of_birth = $human['birthdate'];
			$pasien->phone = $human['phone'];
			$pasien->ktp = $human['ktp'];
			$pasien->job = $human['occupation'];
			$pasien->photo_ori = $human['avatar'];
			$pasien->photo_thumb = $human['avatar_thumb'];
			$pasien->created_by = 1;
			$pasien->save();

			if($human['type']!=3){
				$asuransi = app('App\Http\Controllers\Pasien\PasienAsuransi\CreateController')->create($pasien->id,$human);
			}

			else{
				$kerjasama = app('App\Http\Controllers\Pasien\PasienPerusahaanKerjasama\CreateController')->create($pasien->id,$human);
			}

			$wali = app('App\Http\Controllers\Pasien\PasienWali\CreateController')->create($pasien->id);

			return array(
				'pasien' => $pasien,
				'status' => 1
			);
		}
		catch (\Exception $e) {
			return array(
				'pasien' => $e->getMessage(),
				'status' => 0
			);
		}


	}
}
