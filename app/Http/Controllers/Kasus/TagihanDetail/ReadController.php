<?php

namespace App\Http\Controllers\Kasus\TagihanDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\TagihanDetail;
use App\Models\Kasus\Kasus;

class ReadController extends Controller
{
    	public function get($nomor_kasus,$id)
    	{
    		$tagihan = TagihanDetail::find($id);
    		return json_encode($tagihan);
    	}
}
