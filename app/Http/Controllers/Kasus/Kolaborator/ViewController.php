<?php

namespace App\Http\Controllers\Kasus\Kolaborator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kolaborator;
use App\Models\Kasus\Kasus;

class ViewController extends Controller
{
    	public function index($nomor_kasus)
    	{
    		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$data['kolaborator'] = Kolaborator::where('kasus_id',$kasus->id)->get();
    		$data['kasus'] = $kasus;
    		$data['sidebar_active'] = 'kolaborator';
    		return view('kasus.kolaborator.index',$data);
    	}
}
