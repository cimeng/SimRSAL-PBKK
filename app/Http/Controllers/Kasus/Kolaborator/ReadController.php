<?php

namespace App\Http\Controllers\Kasus\Kolaborator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Kasus\Kolaborator;
use App\Models\Kasus\Kasus;

class ReadController extends Controller
{
	public function search(Request $request,$nomor_kasus)
	{
		$keyword = $request->get('keyword');
		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
		$kolaborators = Kolaborator::where('kasus_id',$kasus->id)->pluck('user_id');
		$kolaborators_array = json_decode(json_encode($kolaborators), true);

		if(!empty($keyword))
		{
			$users = User::search($keyword)->paginate(5);
		}
		else
		{
			$users  = User::inRandomOrder()->take(5)->get();
		}
		$array_users = [];

		foreach($users as $user)
		{
			array_push($array_users, $user->id);
		}

		$users = User::whereIn('id',$array_users)->with('profesi_detail')->get();
		foreach($users as $user)
		{
			if(in_array($user->id, $kolaborators_array))
			{
				$user->invited = 1;
			}
			else $user->invited = 0;
		}

		return json_encode($users);
	}
}
