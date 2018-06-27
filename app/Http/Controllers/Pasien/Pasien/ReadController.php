<?php

namespace App\Http\Controllers\Pasien\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use App\Models\Kasus\Kasus;
use App\Models\Kasus\Resep;
use App\Models\Kasus\Penunjang;
use App\Models\Kasus\PenunjangPermintaan;
use App\Models\Pasien\AlamatKecamatan;
use App\Models\Pasien\AlamatKota;

use App\Models\Hospital\TransaksiMasukDetail as Transaksi;
use Carbon\Carbon;
use DB;

class ReadController extends Controller
{
	public function get(Request $request){

		$search = $request->get('keyword');
		if(!empty($search))
			$pasien = Pasien::search($search)->paginate(10);
		else
			$pasien = Pasien::orderBy('id', 'desc')->paginate(10);


		foreach($pasien as $item)
		{
            if($item->gender == 1) $jenis_kelamin = 'Laki Laki';
            else $jenis_kelamin = 'Perempuan';

            if($item->type == 1) $types = 'Umum';
            elseif($item->type == 2) $types = 'TNI';
            elseif($item->type == 3) $types = 'Kerjasama';
            else $types='-';

			$item->age = Carbon::parse($item->date_of_birth)->age;
            $item->jenis_kelamin = $jenis_kelamin;
            $item->types = $types;

            $kota = AlamatKota::find($item->city);
            $kota = $kota->name;
            $item->alamat_kota = $kota;

            $kecamatan = AlamatKecamatan::find($item->district);
            $kecamatan = $kecamatan->name;
            $item->alamat_kecamatan = $kecamatan;

		}

		return $pasien;
	}

    public function profile($id)
    {
        $kasus_ids = Kasus::where('pasien_id',$id)->get()->pluck('id'); 

        $data['kasus'] = Kasus::where('pasien_id',$id)->get(); 
        $data['identitas'] = Pasien::find($id);
        $data['penunjang'] = Penunjang::whereIn('kasus_id',$kasus_ids)->get();
        $data['penunjangpermintaan'] = PenunjangPermintaan::whereIn('kasus_id',$kasus_ids)->get();
        $data['resep'] = Resep::whereIn('kasus_id',$kasus_ids)->get();
        return $data;
    }

    public function getTotalPasien()
    {
        $today = Carbon::today();
        $data[0] = Pasien::count();
        $data[1] = Pasien::whereDate('created_at', '<', $today)
                    ->count();
        if ($data[1] !=0 && $data[0] !=0) {
            $data[1] = ($data[0] - $data[1])/$data[1] * 100;
        }

        return $data;
    }

    public function getNewPasien()
    {   
        $today = Carbon::today();
        $data[0] = Pasien::whereDate('created_at', $today)
                    ->count();
        $data[1] = Pasien::whereDate('created_at', '<', $today)
                    ->count();

        if ($data[1] !=0 && $data[0] !=0) {
            $data[1] = ($data[0] - $data[1])/$data[1] * 100;
        }else{
            $data[1] = 0;
        }

        return $data;
    }

    public function getKunjungan()
    {
        $day = Carbon::now();

        $jalan = Transaksi::whereDate('created_at', '>=', $day->copy()->startOfYear())
                    ->groupBy('month')
                    ->orderBy('month', 'ASC')
                    ->where('modul_id', 2)
                    ->get(array(
                            DB::raw('MONTH(created_at)+1 as month'),
                            DB::raw('COUNT(*) as "transaksi_count"')
                        ));
        $inap =Transaksi::whereDate('created_at', '>=', $day->copy()->startOfYear())
                    ->groupBy('month')
                    ->orderBy('month', 'ASC')
                    ->where('modul_id', 3)
                    ->get(array(
                            DB::raw('MONTH(created_at)+1 as month'),
                            DB::raw('COUNT(*) as "transaksi_count"')
                        ));
         $igd = Transaksi::whereDate('created_at', '>=', $day->copy()->startOfYear())
                    ->groupBy('month')
                    ->orderBy('month', 'ASC')
                    ->where('modul_id', 8)
                    ->get(array(
                            DB::raw('MONTH(created_at) as month'),
                            DB::raw('COUNT(*) as "transaksi_count"')
                        ));
        $j=0; $k=0; $l=0;
        
        for ($i=1; $i <= 12; $i++) { 
            if(!$jalan->isEmpty() && $jalan[$j]->month == $i){
                $data[0][$i] = $jalan[$j];
                unset($jalan[$j]);
                $j++;
            }else{
                $data[0][$i]['month'] = $i;
                $data[0][$i]['transaksi_count'] = 0;
            }


            if(!$inap->isEmpty() && $inap[$k]->month == $i){
                $data[1][$i] = $inap[$k];
                unset($inap[$k]);
                $k++;
            }else{
                $data[1][$i]['month'] = $i;
                $data[1][$i]['transaksi_count'] = 0;
            }


            if(!$igd->isEmpty() && $igd[$l]->month == $i){
                $data[2][$i] = $igd[$l];
                unset($igd[$k]);
                $l++;
            }else{
                $data[2][$i]['month'] = $i;
                $data[2][$i]['transaksi_count'] = 0;
            }
        }
        return $data;
    }

    public function getJenisPasien()
    {
        $data = Pasien::groupBy('type')
                        ->whereNotNull('type')
                        ->get(['type', DB::raw('COUNT(*) as "type_count"')]);
        return $data;
    }

    public function getTempatTransaksi()
    {
        $day = Carbon::today();
        
        $jalan = Transaksi::whereDate('created_at', $day)
                    ->where('modul_id', 2)
                    ->count();
        $inap = Transaksi::whereDate('created_at', $day)
                    ->where('modul_id', 3)
                    ->count();
        $igd = Transaksi::whereDate('created_at', $day)
                    ->where('modul_id', 8)
                    ->count();

        $data[0] = $jalan;
        $data[1] = $inap;
        $data[2] = $igd;

        return $data;
    }

    public function getPasienTerbaru()
    {
        $data = Pasien::orderBy('created_at', 'DESC')
                    ->take(5)->get();
        foreach ($data as $pasien) {
            $pasien['age'] = Carbon::parse($pasien->attributes['birthdate'])->age;
        }
        return $data;
    }

    public function getPasienKelamin()
    {
        $data = Pasien::groupBy('gender')
                    ->whereNotNull('gender')
                    ->get(['gender', DB::raw('COUNT(*) as "gender_count"')]);
        return $data;
    }
}

