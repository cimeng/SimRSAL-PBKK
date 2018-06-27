<?php

namespace App\Http\Controllers\Kasus\Kolaborator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kolaborator;
use App\Models\Kasus\Kasus;

class PostController extends Controller
{
    	public function delete(Request $request)
    	{
    		$kolab = Kolaborator::find($request->id);
    		$kasusId = $kolab->kasus_id;
		$kolab->delete();

		$status = 1;
		$message = 'Kolaborator berhasil dihapus!';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasusId,'delete','kolab',$kolab->id);

		return back()
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
    	}
}
