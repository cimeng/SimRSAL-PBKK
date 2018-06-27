<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Kolaborator;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->profesi == 20) $role = 'admisi';
        elseif(Auth::user()->profesi == 21) $role = 'manajemen';
        else $role = 'dokter';

        if($role == 'dokter')
        {
            $data = $this->dokter();
            return view('home.dokter',$data);

        }
        elseif($role == 'admisi')
        {
            return view('home.admisi');
        }
        elseif($role == 'manajemen')
        {
            return view('home.admisi');
        }
    }

    private function dokter()
    {
        $id = Auth::user()->id;
        $kolab = Kolaborator::where('user_id',$id)->pluck('kasus_id')->all();
        $kasus = Kasus::whereIn('id',$kolab)->where('end',0)->get();
        $month_now = Carbon::now()->startOfMonth();
        $end = Carbon::now();
        
        $stat = Kolaborator::where('user_id',$id)->whereBetween('created_at', [$month_now, $end])->count();
        $data['stat'] = $stat;
        $data['kasus'] = $kasus;
        return $data;


    }
}

