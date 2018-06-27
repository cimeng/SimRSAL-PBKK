<?php

namespace App\Http\Controllers\Kasus\Kolaborator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kolaborator;
use App\Models\Kasus\Kasus;

class EditController extends Controller
{
	public function admin($nomor_kasus, Request $request)
	{

		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
		$user_id = $request->id;


		$old_admin = Kolaborator::where('admin',1)->where('kasus_id',$kasus->id)->first();
		if(!empty($old_admin))
		{			
			$old_admin->admin = 0;
			$old_admin->save();
		}
		$kolaborator = Kolaborator::where('user_id',$user_id)->where('kasus_id',$kasus->id)->first();
		$kolaborator->admin = 1;
		$kolaborator->save();

		$kasus->dpjp = $user_id;
		$kasus->save();

		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasus->id,'edit','kolab',$kolaborator->id);


		$status = 1;
		$message = 'Berhasil merubah admin!';
		$title = 'Berhasil!';


		return back()
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}
}
