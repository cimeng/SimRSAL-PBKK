<?php

namespace App\Http\Controllers\Kasus\AlatBantu\APGAR;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\AlatApgar;

class ViewController extends Controller
{
	public function index($nomor_kasus)
    	{
    		$kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
    		$data['kasus'] = $kasus;
    		$apgar = AlatApgar::where('kasus_id',$kasus->id)->orderBy('id','desc')->get();

    		foreach($apgar as $item)
    		{
           	$item = $this->getText($item);
    		}

    		$data['apgar'] = $apgar;


       	$data['sidebar_active'] = 'alat';

    		return view('kasus.alatbantu.apgar.index',$data);
    	}

    	public function getText($data)
	{
		if($data->appearance == 0) $data->appearance_text = 'Blue/Pale';
		else if($data->appearance == 1) $data->appearance_text = 'Blue Extremities, Pink Body';
		else if($data->appearance == 2) $data->appearance_text = 'All Pink';

		if($data->pulse == 0) $data->pulse_text = '> 100 BPM';
		else if($data->pulse == 1) $data->pulse_text = '< 100 BPM';
		else if($data->pulse == 2) $data->pulse_text = 'Absent';

		if($data->grimace == 0) $data->grimace_text = 'None';
		else if($data->grimace == 1) $data->grimace_text = 'Grimace';
		else if($data->grimace == 2) $data->grimace_text = 'Sneeze/Cough';

		if($data->activity == 0) $data->activity_text = 'Limp';
		else if($data->activity == 1) $data->activity_text = 'Some Extremity Flexion';
		else if($data->activity == 2) $data->activity_text = 'Active';

		if($data->respiration == 0) $data->respiration_text = 'Absent';
		else if($data->respiration == 1) $data->respiration_text = 'Irregular/Slow';
		else if($data->respiration == 2) $data->respiration_text = 'Good/Crying';
	}
}
