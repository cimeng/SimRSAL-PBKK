<?php

namespace App\Http\Controllers\Kasus\Resep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Resep;

class DeleteController extends Controller
{
	public function deleteResep(Request $request)
	{
		$resep = Resep::find($request->id);
		$kasusId = $resep->kasus_id;
		$resep->delete();

		$status = 1;
		$message = 'Resep berhasil dihapus!';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasusId,'delete','resep',$resep->id);

		return back()
		->with('active_nav','resep')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}
}
