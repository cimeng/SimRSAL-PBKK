<?php

namespace App\Http\Controllers\Kasus\Tagihan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Http\Controllers\Kasus\Tagihan\ReadController as TagihanRead;
use App\Http\Controllers\Kasus\Tagihan\CreateController as TagihanCreate;

class ViewController extends Controller
{
	protected $tagihanRead;

	public function __construct(TagihanRead $tagihanRead, TagihanCreate $tagihanCreate)
	{
		$this->tagihanRead = $tagihanRead;
        $this->tagihanCreate = $tagihanCreate;
	}

    public function index($nomor_kasus)
    {
        $kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
        $tagihan = $this->tagihanRead->get($kasus->id);
        if(!empty($tagihan))
        {
            $tagihan = $this->tagihanCreate->create($kasus->id);
        }
        $data['tagihan'] = $this->tagihanRead->get($kasus->id);
        $data['kasus'] = $kasus;
        $data['sidebar_active'] = 'tagihan';
        return view('kasus.tagihan.index',$data);
    }

    public function print($nomor_kasus)
    { 
        $kasus = Kasus::where('nomor_kasus',$nomor_kasus)->first();
        $tagihan = $this->tagihanRead->get($kasus->id);
        if(count($tagihan) == 0)
        {
            $tagihan = $this->tagihanCreate->create($kasus->id);
        }
        $data['tagihan'] = $this->tagihanRead->get($kasus->id);
        $data['kasus'] = $kasus;
        return view('kasus.tagihan.print',$data);
    }
}
