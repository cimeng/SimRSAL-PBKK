<?php

namespace App\Http\Controllers\Pasien\PasienWali;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use App\Models\Pasien\PasienWali;


class CreateController extends Controller
{
    	public function create($id)
    	{
    		$wali = new PasienWali;
            $wali->gender=1;
    		$wali->save();

    		$pasien = Pasien::find($id);
    		$pasien->relatives_id = $wali->id;
    		$pasien->relatives_type = 5;
    		$pasien->save();

    		return $wali;
    	}
}
