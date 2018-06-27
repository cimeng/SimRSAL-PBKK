<?php

namespace App\Http\Controllers\Kasus\CPPT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\CPPT;
use App\Models\Kasus\Kasus;

class PostController extends Controller
{
	public function editCPPT(Request $request)
	{
		$cppt = CPPT::find($request->id);
		$cppt->subjective = $request->subjective;
		$cppt->objective = $request->objective;
		$cppt->assessment = $request->assessment;
		$cppt->plan = $request->plan;
		$cppt->ppa = $request->ppa;
		$cppt->save();
		
		$kasusId = $cppt->kasus_id;

		$status = 1;
		$message = 'CPPT berhasil diubah!';
		$title = 'Berhasil!';

		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasusId,'edit','cppt',$cppt->id);

		return back()
		->with('active_nav','cppt')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}


	public function deleteCPPT(Request $request)
	{
		$cppt = CPPT::find($request->id);
		$kasusId = $cppt->kasus_id;
		$cppt->delete();

		$status = 1;
		$message = 'CPPT berhasil dihapus!';
		$title = 'Berhasil!';


		$log = app('App\Http\Controllers\Kasus\Log\CreateController')
		->create($kasusId,'delete','cppt',$cppt->id);

		return back()
		->with('active_nav','cppt')
		->with('message', $message)
		->with('title',$title)
		->with('status', $status);
	}


	public function printCPPT($nomor_kasus, $id)
	{
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
		$cppt = CPPT::find($id);
		$kasusId = $cppt->kasus_id;
		$data['cppt'] = $cppt;
		if($kasus->id != $cppt->kasus_id)
		{
			return abort(404);
		}
		else
		{
			$log = app('App\Http\Controllers\Kasus\Log\CreateController')
			->create($kasusId,'print','cppt',$cppt->id);
			return view('kasus.datamedis.content.cppt.print',$data);
		}
	}
}
