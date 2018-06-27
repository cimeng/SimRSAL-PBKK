<?php

namespace App\Http\Controllers\Kasus\Diagnosis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Diagnosis;

class PostController extends Controller
{
	public function delete(Request $request)
	{
		$diagnosis = Diagnosis::find($request->id);
		$kasusId = $diagnosis->kasus_id;
		$diagnosis->delete();

		$status = 1;
		$message = 'Diagnosis berhasil dihapus!';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasusId,'delete','diagnosis',$diagnosis->id);


		return back()
		->with('active_nav','diagnosis')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}

}
