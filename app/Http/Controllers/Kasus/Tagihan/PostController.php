<?php

namespace App\Http\Controllers\Kasus\Tagihan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    	public function checkout(Request $request, $nomor_kasus)
    	{
		try {
	    		$tagihan_id = $request->input('tagihan_id');
	    		$checkout = app('App\Http\Controllers\Kasus\Tagihan\EditController')->checkout($tagihan_id);

	    		$status = 1;
	    		$message = 'Tagihan berhasil di checkout';
	    		$title = 'Berhasil!';

		}
		catch (\Exception $e) {
			$status = -1;
	    		$message = 'Tagihan gagal di checkout';
	    		$title = 'Berhasil!';
		}


    		return back()
    		->with('message', $message)
    		->with('title',$title)
    		->with('status', $status);

    	}
}
