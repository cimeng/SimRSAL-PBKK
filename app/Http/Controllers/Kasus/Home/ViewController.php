<?php

namespace App\Http\Controllers\Kasus\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Log;
use App\Models\Kasus\ToDo;
use App\Models\Kasus\OperasiPermintaan;
use Carbon\Carbon;
use DateTime;

class ViewController extends Controller
{
	public function index($nomor_kasus)
	{
		$kasus = Kasus::where('nomor_kasus', $nomor_kasus)->first();
		$data['operasi'] = $this->getEventOperasi($kasus->id);
		$data['data_baru'] = $this->getDataBaru($kasus->id);
		$data['todos'] = $this->getToDo($kasus->id);
		$data['activities'] = $this->getActivities($kasus->id);
		$data['sidebar_active'] = '';
		$data['kasus'] = $kasus;

		return view('kasus.home.home',$data);
	}

	private function getEventOperasi($kasus_id)
	{
		$today = Carbon::today();
		$operasi = OperasiPermintaan::where('kasus_id',$kasus_id)->with('transaksi')->get();

		foreach($operasi as $item)
		{
			if(!empty($item->transaksi->jadwal_operasi))
			{
				$date = $item->transaksi->jadwal_operasi;
				$date_format = Carbon::createFromFormat('Y-m-d', $date);

				if($date_format > $today)
				{
					$first_operasi = $item->transaksi;

					$diff = $date_format->diffInDays($today);

					$first_operasi->diff = $diff;
					return $first_operasi;
				}
			}
		}
		return null;
	}

	private function getDataBaru($kasus_id)
	{
		$today = Carbon::today();
		$data['cppt'] = Log::where('type','create')
		->where('tab','cppt')
		->where('kasus_id',$kasus_id)
		->where('created_at','>',$today)
		->count();


		$data['penunjang'] = Log::where('type','create')
		->where('tab','like','penunjang%')
		->where('created_at','>',$today)
		->where('kasus_id',$kasus_id)
		->count();


		$data['tagihan'] = Log::where('type','create')
		->where('tab','tagihan')
		->where('created_at','>',$today)
		->where('kasus_id',$kasus_id)
		->count();

		$all_log = Log::where('type','create')
		->where('created_at','>',$today)
		->where('kasus_id',$kasus_id)
		->count();

		$data['lain'] = $all_log - $data['cppt'] - $data['penunjang'] - $data['tagihan'];
		
		return $data;
	}

	private function getToDo($kasus_id)
	{
		$todos = ToDo::where('kasus_id',$kasus_id)->where('status',0)->get();
		return $todos;
	}

	private function getActivities($kasus_id)
	{
		$today = Carbon::today();
		$all_log = Log::where('created_at','>',$today)
		->where('kasus_id',$kasus_id)
		->orderBy('created_at','desc')
		->paginate(10);

		foreach($all_log as $log)
		{
			$log_string = $this->generateLogString($log);
			$log->tab_string = $log_string['tab'];
			$log->type_string = $log_string['type'];
			$log->icon = $log_string['icon'];
		}

		return $all_log;
	}

	private function generateLogString($log)
	{
		$tab = $log->tab;
		$type = $log->type;
		$icon = 'fa-stethoscope';

		if($type == 'create') $type_string = 'menambahkan';
		elseif($type == 'edit') $type_string = 'mengubah';
		elseif($type == 'delete') $type_string = 'menghapus';
		elseif($type == 'close') $type_string = 'menutup';
		else $type_string = '';

		if($tab == 'cppt') $tab_string = 'CPPT';
		elseif($tab == 'diagnosis') $tab_string = 'Diagnosis';
		elseif($tab == 'tindakan') $tab_string = 'Tindakan';
		elseif($tab == 'identitas') $tab_string = 'Identitas';
		elseif($tab == 'lokasi') $tab_string = 'Lokasi';
		elseif($tab == 'resep') $tab_string = 'Resep';
		elseif($tab == 'gizi') $tab_string = 'Gizi';
		elseif($tab == 'penunjang-radiologi') $tab_string = 'Hasil Radiologi';
		elseif($tab == 'penunjang-labpk') $tab_string = 'Hasil Lab';
		elseif($tab == 'permintaan-operasi') $tab_string = 'Permintaan Operasi';
		elseif($tab == 'tagihan') $tab_string = 'Tagihan';
		elseif($tab == 'alat-mews') $tab_string = 'Alat Mews';
		elseif($tab == 'alat-apgar') $tab_string = 'Alat Apgar';
		elseif($tab == 'alat-poedji') $tab_string = 'Alat Poedji';
		elseif($tab == 'kasus') $tab_string = 'Kasus';
		elseif($tab == 'administrasi-rawatinap-daftar') 
		{
			$type_string = 'Mendaftarkan';
			$tab_string = 'ke Rawat Inap';
			$icon = 'fa-file-text';
		}
		elseif($tab == 'administrasi-rawatinap-pindah') 
		{
			$type_string = 'Pindah Ruang';
			$tab_string = 'Rawat Inap';
			$icon = 'fa-file-text';
		}
		elseif($tab == 'administrasi-rawatjalan-daftar') 
		{
			$type_string = 'Mendaftarkan';
			$tab_string = 'ke Rawat Jalan';
			$icon = 'fa-file-text';
		}
		elseif($tab == 'administrasi-igd-daftar') 
		{
			$type_string = 'Mendaftarkan';
			$tab_string = 'ke IGD';
			$icon = 'fa-file-text';
		}
		else
		{
			$tab = '';
			$tab_string = '';
		}

		$data['type'] = $type_string;
		$data['tab'] = $tab_string;
		$data['icon'] = $icon;

		return $data;
	}
}
