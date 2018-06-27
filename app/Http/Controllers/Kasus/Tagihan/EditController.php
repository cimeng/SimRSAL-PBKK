<?php

namespace App\Http\Controllers\Kasus\Tagihan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Tagihan;
use App\Models\Kasus\TagihanDetail;

class EditController extends Controller
{
	public function edit_bill($tagihan_id,$nominal)
	{
		try {
			$tagihan = Tagihan::find($tagihan_id);
			$tagihan->total_bill = $tagihan->total_bill + $nominal;
			$tagihan->save();
			return 1;
		}
		catch (\Exception $e) {
			return 0;
		}
	}

	public function checkout($tagihan_id)
	{
		$tagihan = Tagihan::find($tagihan_id);
		$tagihan->checkout = 1;
		$tagihan->save();
		return 1;
	}
}
