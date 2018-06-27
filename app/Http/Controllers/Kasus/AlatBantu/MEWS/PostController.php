<?php

namespace App\Http\Controllers\Kasus\AlatBantu\MEWS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\AlatMews;
use Auth;

class PostController extends Controller
{
	public function create($nomor_kasus,Request $request)
	{
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();

		$resp = $request->input('resp');
		$o2 = $request->input('o2');
		$suplo2 = $request->input('suplo2');
		$sys = $request->input('sys');
		$pulse = $request->input('pulse');
		$avpu = $request->input('avpu');
		$temp = $request->input('temp');

		$score = abs($resp) + abs($o2) + abs($suplo2) + abs($sys) + abs($pulse) + abs($avpu) + abs($temp);

		$mews = new AlatMews;
		$mews->kasus_id = $kasus->id;
		$mews->resp = $request->input('resp');
		$mews->o2 = $request->input('o2');
		$mews->suplo2 = $request->input('suplo2');
		$mews->sys = $request->input('sys');
		$mews->pulse = $request->input('pulse');
		$mews->avpu = $request->input('avpu');
		$mews->temp = $request->input('temp');
		$mews->score = $score;
		$mews->created_by = Auth::user()->id;
		$mews->save();


		$status = 1;
		$message = 'Mews berhasil dibuat';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'create','alat-mews',$mews->id);

		return back()
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);

	}
}
