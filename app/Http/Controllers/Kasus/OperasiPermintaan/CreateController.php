<?php

namespace App\Http\Controllers\Kasus\OperasiPermintaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\OperasiPermintaan;
use App\Models\Kasus\Kasus;
use Auth;

class CreateController extends Controller
{
    	public function create($kasus_id,$transaksi_id)
    	{
    		$permintaan = new OperasiPermintaan;
    		$permintaan->kasus_id = $kasus_id;
    		$permintaan->transaksi_id = $transaksi_id;
    		$permintaan->created_by = Auth::user()->id;
    		$permintaan->save();


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus_id,'create','permintaan-operasi',$permintaan->id);

    		return $permintaan;
    	}
}
