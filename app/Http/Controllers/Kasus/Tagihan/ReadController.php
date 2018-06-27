<?php

namespace App\Http\Controllers\Kasus\Tagihan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tagihan;

class ReadController extends Controller
{
    	public function get($kasus_id)
    	{
    		$tagihan = Tagihan::where('kasus_id',$kasus_id)->first();
    		return $tagihan;
    	}
}
