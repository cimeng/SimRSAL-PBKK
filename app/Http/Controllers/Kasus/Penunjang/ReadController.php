<?php

namespace App\Http\Controllers\Kasus\Penunjang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Penunjang;

class ReadController extends Controller
{
    	public function get($id)
    	{
    		$penunjang = Penunjang::where('kasus_id',$id)->orderBy('id','desc')->get();
    		return $penunjang;
    	}
}
