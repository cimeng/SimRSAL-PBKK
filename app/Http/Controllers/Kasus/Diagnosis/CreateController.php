<?php

namespace App\Http\Controllers\Kasus\Diagnosis;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Diagnosis;
use App\Models\Kasus\Kasus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CreateController extends Controller
{
    public function createNewDiagnosis(Request $request) {
        $nomorKasus = $request->input('nomor-kasus');
        $kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();

        $utama = 0;
        if($request->input('utama') == 'on')
            $utama = 1;

        $diagnosis = new Diagnosis();
        $diagnosis->kasus_id = $kasusId;
        $diagnosis->utama = $utama;
        $diagnosis->icd_10 = $request->input('id-diagnosis');
        $diagnosis->created_by = Auth::user()->id;
        $diagnosis->save();

        $status = 1;
        $message = 'Diagnosis baru berhasil dibuat!';
        $title = 'Berhasil!';



        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
        ->create($kasusId,'create','diagnosis',$diagnosis->id);



        return back()
            ->with('active_nav','diagnosis')
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status);
    }
}
