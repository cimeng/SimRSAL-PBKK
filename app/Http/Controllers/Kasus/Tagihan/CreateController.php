<?php

namespace App\Http\Controllers\Kasus\Tagihan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tagihan;
use App\Models\Kasus\TagihanDetail;
use Auth;

class CreateController extends Controller
{
   public function create($kasus_id)
   {
      $tagihan = Tagihan::where('kasus_id',$kasus_id)->first();
      if(empty($tagihan))
      {
         $tagihan = new Tagihan;
         $tagihan->kasus_id = $kasus_id;
         $tagihan->total_bill = 0; 
         $tagihan->total_paid = 0; 
         $tagihan->created_by = Auth::user()->id;
         $tagihan->save();
     }

     return $tagihan;

 }
}
