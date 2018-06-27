<?php

namespace App\Http\Controllers\Kasus\PenunjangPermintaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\PenunjangPermintaan;

class ReadController extends Controller
{
    	public function get($id)
    	{
    		$permintaan = PenunjangPermintaan::where('kasus_id',$id)->orderBy('id','desc')->get();
    		return $permintaan;
    	}
}
