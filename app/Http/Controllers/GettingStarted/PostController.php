<?php

namespace App\Http\Controllers\GettingStarted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Hospital\User;

class PostController extends Controller
{
    	public function profesi(Request $request)
    	{
    		$user = User::find(Auth::user()->id);
    		$user->profesi = $request->role;
    		$user->save();

    		return redirect('getting-started/avatar');
    	}


    	public function avatar(Request $request)
    	{

    		if ($request->hasFile('avatar')) {
    			$avatar = $request->file('avatar');
    			$image = app('App\Http\Controllers\Functions\ImageUploader')->upload($avatar,'user');
    			$avatar = $image['file_original'];
    			$avatar_thumb = $image['file_thumbnail'];
    		}
    		else
    		{
    			$avatar = 'assets/img/placeholder.jpg';
    			$avatar_thumb = $avatar;
    		}


    		$user = User::find(Auth::user()->id);
    		$user->avatar_ori = $avatar;
    		$user->avatar_thumb = $avatar_thumb;
    		$user->save();

    		return redirect('home');
    	}
}
