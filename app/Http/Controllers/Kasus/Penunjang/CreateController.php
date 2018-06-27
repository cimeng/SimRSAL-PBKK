<?php

namespace App\Http\Controllers\Kasus\Penunjang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Penunjang;

class CreateController extends Controller
{
    	public function createData($file_url,$title,$caption,$kasus_id,$file_type,$type,$permintaan_id)
    	{
    		$penunjang = new Penunjang;
    		$penunjang->judul = $title;
    		$penunjang->caption = $caption;
    		$penunjang->kasus_id = $kasus_id;
    		$penunjang->file = $file_url;
    		$penunjang->file_primary = $file_url;
    		$penunjang->file_thumb = $file_url;
    		$penunjang->type = $type;
    		$penunjang->file_type = $file_type;
    		$penunjang->penunjang_permintaan_id = $permintaan_id;
    		$penunjang->save();

    		return $penunjang;
    	}
}
