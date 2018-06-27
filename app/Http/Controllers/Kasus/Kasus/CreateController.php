<?php

namespace App\Http\Controllers\Kasus\Kasus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Kasus\Kolaborator;
use App\Models\Kasus\Lokasi;
use App\Models\Kasus\Identitas;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Tagihan;
use App\Models\Kasus\TagihanDetail;
use App\Models\Hospital\TransaksiMasuk;
use App\User;
use Auth;

class CreateController extends Controller
{
	public function createKasus($judul_kasus,$pasien,$location,$transaksi_masuk_detail_id,$kelas)
	{
		$id = 0;
		$nomor_kasus = $this->generateNomorKasus();
		$kasus = New Kasus;
		$kasus->nomor_kasus = $nomor_kasus;
		$kasus->judul_kasus = $judul_kasus;
		$kasus->created_by = $id;
		$kasus->slug = $nomor_kasus;
		$kasus->transaksi_masuk_detail_id = $transaksi_masuk_detail_id;
		$kasus->pasien_id = $pasien->id;
		$kasus->kelas = $kelas;
		$kasus->save();


		$collaborator = $this->beCollaborator($kasus->id);
		$lokasi = $this->insertLokasi($kasus->id,$location);
		$identitas = $this->insertIdentitas($kasus->id,$pasien);
		$tagihan = $this->insertTagihan($kasus->id,$transaksi_masuk_detail_id);

		return $kasus;
	}

	private function generateNomorKasus()
	{
		$last_kasus = DB::connection('kasus')->table('kasus')->where('id', DB::raw("(select max(`id`) from kasus)"))->get();
		$last_kasus = 10000000000+$last_kasus[0]->id+1;
		$slug_kasus = 'med'.substr($last_kasus, 1);

		return $slug_kasus;
	}

	private function beCollaborator($kasus_id){

		$id = Auth::user()->id;
		$id_user = $id;
		$user = User::find($id);
		$profesi = $user->profesi;

		if($profesi == 1) $role = '2';
		elseif($profesi == 2) $role = '6';
		elseif($profesi == 3) $role = '10';
		elseif($profesi == 4) $role = '13';
		elseif($profesi == 5) $role = '17';
		elseif($profesi == 8) $role = '4';
		elseif($profesi == 12) $role = '15';
		elseif($profesi == 16) $role = '14';
		elseif($profesi == 19) $role = '18';
		elseif($profesi == 20) $role = '11';
		else $role = '0';

		$data = new Kolaborator;
		$data->kasus_id = $kasus_id;
		$data->user_id = $id_user;
		$data->admin = 1;
		$data->save();

		return 1;


	}

	private function insertLokasi($kasus_id,$lokasi){

		$id_user = 9;

		$data = new Lokasi;
		$data->kasus_id = $kasus_id;
		$data->lokasi = $lokasi;
		$data->created_by = $id_user;
		$data->save();

		return 1;
	}

	private function insertIdentitas($kasus_id,$patient)
	{
		$id_user = Auth::user()->id;

		if($patient->gender == 1) $gender = 'L';
		else $gender = 'P';
		$data = new Identitas;
		$data->nama = $patient->name;
		$data->jenis_kelamin = $gender;
		$data->alamat = $patient->address;
		$data->pekerjaan = $patient->job;
		$data->tempat_lahir = $patient->place_of_birth;
		$data->tanggal_lahir = $patient->date_of_birth;
		$data->no_hp = $patient->phone;
		$data->kasus_id = $kasus_id;
		$data->pasien_id = $patient->id;
		$data->avatar_thumb = $patient->photo_thumb;
		$data->avatar_small = $patient->photo_thumb;
		$data->avatar = $patient->photo_ori;

		if($patient->type == 1 || $patient->type == 2)
		{
			$data->asuransi = $patient->pasien_asuransi->company->name;
			$data->no_asuransi = $patient->pasien_asuransi->number;
		}
		else
		{
			$data->asuransi = $patient->pasien_kerjasama->company->name;
			$data->no_asuransi = $patient->pasien_kerjasama->number;
		}
		
		$data->no_identitas = $patient->ktp;
		$data->updated_by = $id_user;
		$data->save();

		return 1;
	}

	private function insertTagihan($kasus_id,$transaksi_id)
	{
		//find kasus
		$transaksi = TransaksiMasuk::find($transaksi_id);

		if(!empty($transaksi->kasus_rujuk_id))
		{
			//find old tagihan
			$old_tagihan = Tagihan::where('kasus_id',$transaksi->kasus_rujuk_id)->first();
			if(!empty($old_tagihan))
			{
				$old_kasus = Kasus::find($transaksi->kasus_rujuk_id);

				$tagihan = new Tagihan;
				$tagihan->kasus_id = $kasus_id;
				$tagihan->total_bill = $old_tagihan->total_bill;
				$tagihan->total_paid = $old_tagihan->total_paid;
				$tagihan->is_paid = $old_tagihan->is_paid;
				$tagihan->created_by = Auth::user()->id;
				$tagihan->save();

				foreach($old_tagihan->detail as $item)
				{
					$tagihan_detail = $item->replicate();
					$tagihan_detail->kasus_tagihan_id = $tagihan->id;
					$tagihan_detail->save();

				}			
			}
			
		}
		else
		{
			$tagihan = new Tagihan;
			$tagihan->kasus_id = $kasus_id;
			$tagihan->total_bill = 0;
			$tagihan->total_paid =0;
			$tagihan->is_paid = 0;
			$tagihan->created_by = Auth::user()->id;
			$tagihan->save();
		}

		return 1;
	}
}
