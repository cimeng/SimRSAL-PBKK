<?php

namespace App\Http\Controllers\Pasien\PasienWali;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use App\Models\Pasien\PasienWali;
use DB;

class EditController extends Controller
{
	public function APIEditKerabatPasien(Request $request)
	{
		DB::beginTransaction();
		try
		{
			$id = $request->input('id');
			$wali = PasienWali::find($id);
			$wali->name = $request->input('name');
			$wali->email = $request->input('email');
			$wali->gender = $request->input('gender');
			$wali->address = $request->input('address');
			$wali->city = $request->input('city');
			$wali->district = $request->input('district');
			$wali->phone = $request->input('phone');
			$wali->birthplace = $request->input('birthplace');
			$wali->birthdate = $request->input('birthdate');
			$wali->ktp = $request->input('ktp');
			$wali->pasien_template_id = $request->input('pasien_template_id');
			$wali->save();

			$pasien_id = $request->input('pasien_id');
			$pasien = Pasien::find($pasien_id);
			$pasien->relatives_type = $request->input('relatives_type');
			$pasien->save();

			DB::commit();

			$data['type'] = 'success';
			$data['title'] = 'Berhasil';
			$data['text'] = 'Data penanggung jawab pasien berhasil diubah';
			$data['url'] = 'pasien/'.$pasien_id;



		}

		catch (\Exception $e) {
			DB::rollBack();

			$data['type'] = 'error';
			$data['title'] = 'Oops! Gagal';
			$data['text'] = 'Data penanggung jawab pasien gagal diubah. Kesalahan server hubungi admin!';
			$data['url'] = 0;

		}

        	return json_encode($data);


	}
}
