<?php

namespace App\Http\Controllers\Kasus\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Log;
use Auth;

class CreateController extends Controller
{
    	public function create($kasus_id,$type,$tab,$data_id)
    	{
    		if(Auth::check())
    		{
    			$created_by = Auth::user()->id;
    		}
    		else $created_by = 0;

    		$log = new Log;
    		$log->kasus_id = $kasus_id;
    		$log->type = $type;
    		$log->tab = $tab;
    		$log->data_id = $data_id;
    		$log->created_by = $created_by;
    		$log->save();
    		return $log;
    	}
}
