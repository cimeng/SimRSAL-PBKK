<?php

namespace App\Http\Controllers\Kasus\Kolaborator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kolaborator;
use App\Models\Kasus\Kasus;
use Auth;

class CreateController extends Controller
{
    	public function create($nomor_kasus, Request $request)
    	{
    		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$user_id = $request->user_id;
    		$kolaborator = new Kolaborator();
    		$kolaborator->kasus_id = $kasus->id;
    		$kolaborator->user_id = $user_id;
            $kolaborator->created_by = Auth::user()->id;
    		$kolaborator->save();

    		return 1;
    	}
}
