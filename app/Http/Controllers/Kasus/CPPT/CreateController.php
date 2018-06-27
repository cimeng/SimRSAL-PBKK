<?php

namespace App\Http\Controllers\Kasus\CPPT;

use App\Models\Kasus\CPPT;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CreateController extends Controller
{
    public function createNewCPPT(Request $request) {

        $nomorKasus = $request->input('nomor-kasus');
        $kasusId = Kasus::where('nomor_kasus', $nomorKasus)->pluck('id')->first();

        $cppt = new CPPT();
        $cppt->kasus_id = $kasusId;
        $cppt->subjective = $request->input('subjective');
        $cppt->objective = $request->input('objective');
        $cppt->assessment = $request->input('assessment');
        $cppt->plan = $request->input('plan');
        $cppt->ppa = $request->input('instruksi-ppa');
        $cppt->created_by= Auth::user()->id;


        $log = new Log();
        $log->kasus_id = $kasusId;

        $cppt->save();

        if($request->input('todo') == 'on')
        $todo = app('App\Http\Controllers\Kasus\Todo\CreateController')
                ->create($request->input('instruksi-ppa'),Auth::user()->id,$cppt->id,$kasusId);

        $status = 1;
        $message = 'CPPT baru berhasil dibuat!';
        $title = 'Berhasil!';


        $log = app('App\Http\Controllers\Kasus\Log\CreateController')
                ->create($kasusId,'create','cppt',$cppt->id,$kasusId);

        return back()
            ->with('message', $message)
            ->with('active_nav','cppt')
            ->with('title',$title)
            ->with('status', $status);
    }
}
