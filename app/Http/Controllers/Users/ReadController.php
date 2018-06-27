<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ReadController extends Controller
{
    	public function index()
    	{
    		$user = User::find(Auth::user()->id);
    		return json_encode($user);
    	}

    	public function search(Request $request)
    	{
    		$keyword = $request->get('keyword');
    		$users = User::search($keyword)->paginate(10);
    		$array_users = [];

    		foreach($users as $user)
    		{
    			array_push($array_users, $user->id);
    		}

    		$users = User::whereIn('id',$array_users)->with('profesi_detail')->get();
    		return json_encode($users);
    	}
}
