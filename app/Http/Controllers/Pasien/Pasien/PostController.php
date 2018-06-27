<?php

namespace App\Http\Controllers\Pasien\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use Carbon\Carbon;
use DB;

class PostController extends Controller
{

    public function APICreatePasien(Request $request)
    {
        /*UNTUK REQUEST BUAT PASIEN BARU VIA JQUERY AJAX JSON*/

        DB::beginTransaction();
        try{
            $birthdate = Carbon::createFromFormat('Y-m-d', $request->input('birthdate'))->toDateTimeString();
            $type = $request->input('type');
            if($type!=3)
            {
                $asuransi = $request->input('asuransi');
                $asuransi_nomor = $request->input('asuransi_nomor');
                $perusahaan_kerjasama = '';
                $identitas_pegawai = '';
            }
            else
            {
                $asuransi = '';
                $asuransi_nomor ='';
                $perusahaan_kerjasama = $request->input('perusahaan_kerjasama');
                $identitas_pegawai = $request->input('identitas_pegawai');
            }

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $image = app('App\Http\Controllers\Functions\ImageUploader')->upload($avatar,'pasien');
                $avatar = $image['file_original'];
                $avatar_thumb = $image['file_thumbnail'];
            }
            else
            {
                $avatar = 'assets/img/placeholder.jpg';
                $avatar_thumb = $avatar;
            }

            $pasien = array(
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'marriage' => $request->input('marriage'),
                'birthplace' => $request->input('birthplace'),
                'birthdate' => $birthdate,
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'phone' => $request->input('phone'),
                'ktp' => $request->input('ktp'),
                'type' => $type,
                'asuransi' => $asuransi,
                'asuransi_nomor' => $asuransi_nomor,
                'perusahaan_kerjasama' => $perusahaan_kerjasama,
                'identitas_pegawai' => $identitas_pegawai,
                'class' => $request->input('kelas'),
                'occupation' => $request->input('occupation'),
                'avatar' => $avatar,
                'avatar_thumb' => $avatar_thumb
            );


            $new_pasien = app('App\Http\Controllers\Pasien\Pasien\CreateController')->create($pasien);

            $data['type'] = 'success';
            $data['title'] = 'Berhasil';
            $data['text'] = 'Pasien berhasil didaftarkan';
            $data['url'] = 'pasien/'.$new_pasien['pasien']['id'];
            DB::commit();

        }

        catch (\Exception $e) {
            DB::rollBack();
            $data['type'] = 'error';
            $data['title'] = 'Gagal';
            $data['text'] = 'Pasien gagal didaftarkan : Kesalahan Server, silahkan hubungi admin';
            $data['url'] = 0;
        }

        return json_encode($data);
    }

    public function APIEditPasien(Request $request)
    {
        /*UNTUK REQUEST EDIT PASIEN BARU VIA JQUERY AJAX JSON*/

        DB::beginTransaction();
        
            $birthdate = Carbon::createFromFormat('Y-m-d', $request->input('birthdate'))->toDateTimeString();
            $type = $request->input('type');
            if($type!=3)
            {
                $asuransi = $request->input('asuransi');
                $asuransi_nomor = $request->input('asuransi_nomor');
                $perusahaan_kerjasama = '';
                $identitas_pegawai = '';
            }
            else
            {
                $asuransi = '';
                $asuransi_nomor ='';
                $perusahaan_kerjasama = $request->input('perusahaan_kerjasama');
                $identitas_pegawai = $request->input('identitas_pegawai');
            }

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $image = app('App\Http\Controllers\Functions\ImageUploader')->upload($avatar,'pasien');
                $avatar = $image['file_original'];
                $avatar_thumb = $image['file_thumbnail'];
            }
            else
            {
                $pasien = Pasien::find($request->input('id'));
                $avatar = $pasien->photo_ori;
                $avatar_thumb = $pasien->photo_thumb;
            }

            $pasien = array(
                'id' => $request->input('id'),
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'marriage' => $request->input('marriage'),
                'birthplace' => $request->input('birthplace'),
                'birthdate' => $birthdate,
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'phone' => $request->input('phone'),
                'ktp' => $request->input('ktp'),
                'type' => $type,
                'asuransi' => $asuransi,
                'asuransi_nomor' => $asuransi_nomor,
                'perusahaan_kerjasama' => $perusahaan_kerjasama,
                'identitas_pegawai' => $identitas_pegawai,
                'class' => $request->input('kelas'),
                'occupation' => $request->input('occupation'),
                'avatar' => $avatar,
                'avatar_thumb' => $avatar_thumb
            );


            $edited_pasien = app('App\Http\Controllers\Pasien\Pasien\EditController')->edit($pasien);

            $data['type'] = 'success';
            $data['title'] = 'Berhasil';
            $data['text'] = 'Data pasien berhasil diubah';
            $data['url'] = 'pasien/'.$edited_pasien['pasien']['id'];


            DB::commit();


        return json_encode($data);
    }


	public function createPasien(Request $request)
	{

        DB::beginTransaction();

        try
        {

            $birthdate = Carbon::createFromFormat('d/m/Y', $request->input('birthdate'))->toDateTimeString();


            $pasien = array(
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'marriage' => $request->input('marriage'),
                'birthplace' => $request->input('birthplace'),
                'birthdate' => $birthdate,
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'phone' => $request->input('phone'),
                'ktp' => $request->input('ktp'),
                'type' => $request->input('type'),
                'asuransi' => $request->input('asuransi'),
                'asuransi_nomor' => $request->input('asuransi_nomor'),
                'perusahaan_kerjasama' => $request->input('perusahaan_kerjasama'),
                'identitas_pegawai' => $request->input('identitas_pegawai'),
                'class' => $request->input('class'),
                'occupation' => $request->input('occupation')
            );


            $new_pasien = app('App\Http\Controllers\Pasien\Pasien\CreateController')->create($pasien);

            $relatives_option = $request->input('relatives_option');


            if($relatives_option == 1)
            {
                /*PASIEN BARU SEBAGAI KERABAT*/

                $relatives_relationship= $request->input('relatives_relationship'); 
                $relatives_birthdate = Carbon::createFromFormat('d/m/Y', $request->input('relatives_birthdate'))->toDateTimeString();

                $relative = array(
                    'name' => $request->input('relatives_name'),
                    'gender' => $request->input('relatives_gender'),
                    'marriage' => $request->input('relatives_marriage'),
                    'birthplace' => $request->input('relatives_birthplace'),
                    'birthdate' => $relatives_birthdate,
                    'address' => $request->input('relatives_address'),
                    'city' => $request->input('relatives_city'),
                    'district' => $request->input('relatives_district'),
                    'phone' => $request->input('relatives_phone'),
                    'ktp' => $request->input('relatives_ktp'),
                    'type' => NULL,
                    'asuransi' => NULL,
                    'asuransi_nomor' => NULL,
                    'perusahaan_kerjasama' => NULL,
                    'identitas_pegawai' => NULL,
                    'class' => NULL,
                    'occupation' => $request->input('relatives_occupation'),
                );

                $new_relative = app('App\Http\Controllers\Pasien\Pasien\CreateController')->create($relative);

                $new_relative_id = $new_relative['pasien']->id;

            }
            else
            {
                /*JIKA DIA MILIH PASIEN LAMA SEBAGAI KERABAT*/
                $new_relative = Pasien::find($request->input('relatives_id'));
                $new_relative_id = $new_relative->id;
                $relatives_relationship= $request->input('chosen_relatives_relationship'); 
            }

            if(empty($relatives_relationship)) $relatives_relationship = 5;

            /*MEMBERIKAN STATUS RELATIONSHIP KEPADA PASIEN DAN KERABAT*/
            if($relatives_relationship==1) $pasien_relationship = 1;
            else if($relatives_relationship==2) $pasien_relationship = 3;
            else if($relatives_relationship==3) $pasien_relationship = 2;
            else if($relatives_relationship==4) $pasien_relationship = 4;
            else if($relatives_relationship==5) $pasien_relationship = 5;
            else $pasien_relationship = 5;

            $relation = app('App\Http\Controllers\Pasien\Pasien\EditController')
            ->relatives($new_pasien['pasien']->id,$new_relative_id,$relatives_relationship);


            /*JIKA KERABAT PASIEN LAMA MAKA TIDAK PERLU UPDATE KERABAT*/
            if($relatives_option == 1){
                $relation = app('App\Http\Controllers\Pasien\Pasien\EditController')
                ->relatives($new_relative_id,$new_pasien['pasien']->id,$pasien_relationship);
            }

            $status = 1;
            $message = 'Pasien baru berhasil didaftarkan';
            $title = 'Berhasil!';

            return redirect('pasien/'.$new_pasien['pasien']->id)
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status);

            DB::commit();


        }

        catch (\Exception $e) {
            DB::rollBack();


            $status = 0;
            $message = 'Pasien gagal didaftarkan';
            $title = 'Terjadi Kesalahan!';
            
            return redirect('pasien/')
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status);


        }



    }


    public function editPasien($id, Request $request)
    {
        DB::beginTransaction();

        try
        {
            $birthdate = Carbon::createFromFormat('d/m/Y', $request->input('birthdate'))->toDateTimeString();

            $pasien = array(
                'id' => $id,
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'marriage' => $request->input('marriage'),
                'birthplace' => $request->input('birthplace'),
                'birthdate' => $birthdate,
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'phone' => $request->input('phone'),
                'ktp' => $request->input('ktp'),
                'type' => $request->input('type'),
                'asuransi' => $request->input('asuransi'),
                'asuransi_nomor' => $request->input('asuransi_nomor'),
                'perusahaan_kerjasama' => $request->input('perusahaan_kerjasama'),
                'identitas_pegawai' => $request->input('identitas_pegawai'),
                'class' => $request->input('class'),
                'occupation' => $request->input('occupation')
            );
            $edited_pasien = app('App\Http\Controllers\Pasien\Pasien\EditController')->edit($pasien);

            $status = 1;
            $message = 'Data pasien berhasil diubah';
            $title = 'Berhasil!';

            return redirect('pasien/'.$edited_pasien['pasien']['id'])
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status); 
            DB::commit();


        }

        catch (\Exception $e) {
            DB::rollBack();


            $status = 0;
            $message = 'Data pasien gagal diubah';
            $title = 'Terjadi Kesalahan!';
            
            return redirect('pasien/')
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status);


        }
    }

    public function editKerabat($id, Request $request)
    {
        DB::beginTransaction();

        try
        {
        $relatives_option = $request->input('relatives_option');

        if($relatives_option == 1)
        {
            /*PASIEN BARU SEBAGAI KERABAT*/

            $relatives_relationship= $request->input('relatives_relationship'); 
            $relatives_birthdate = Carbon::createFromFormat('d/m/Y', $request->input('relatives_birthdate'))->toDateTimeString();

            $relative = array(
                'name' => $request->input('relatives_name'),
                'gender' => $request->input('relatives_gender'),
                'marriage' => $request->input('relatives_marriage'),
                'birthplace' => $request->input('relatives_birthplace'),
                'birthdate' => $relatives_birthdate,
                'address' => $request->input('relatives_address'),
                'city' => $request->input('relatives_city'),
                'district' => $request->input('relatives_district'),
                'phone' => $request->input('relatives_phone'),
                'ktp' => $request->input('relatives_ktp'),
                'type' => NULL,
                'asuransi' => NULL,
                'asuransi_nomor' => NULL,
                'perusahaan_kerjasama' => NULL,
                'identitas_pegawai' => NULL,
                'class' => NULL,
                'occupation' => $request->input('relatives_occupation'),
            );

            $new_relative = app('App\Http\Controllers\Pasien\Pasien\CreateController')->create($relative);

            $new_relative_id = $new_relative['pasien']->id;

        }
        else
        {
            /*JIKA DIA MILIH PASIEN LAMA SEBAGAI KERABAT*/
            $new_relative = Pasien::find($request->input('relatives_id'));
            $new_relative_id = $new_relative->id;
            $relatives_relationship= $request->input('chosen_relatives_relationship'); 
        }

        if(empty($relatives_relationship)) $relatives_relationship = 5;

        /*MEMBERIKAN STATUS RELATIONSHIP KEPADA PASIEN DAN KERABAT*/
        if($relatives_relationship==1) $pasien_relationship = 1;
        else if($relatives_relationship==2) $pasien_relationship = 3;
        else if($relatives_relationship==3) $pasien_relationship = 2;
        else if($relatives_relationship==4) $pasien_relationship = 4;
        else if($relatives_relationship==5) $pasien_relationship = 5;
        else $pasien_relationship = 5;

        $relation = app('App\Http\Controllers\Pasien\Pasien\EditController')
        ->relatives($id,$new_relative_id,$relatives_relationship);


        /*JIKA KERABAT PASIEN LAMA MAKA TIDAK PERLU UPDATE KERABAT*/
        if($relatives_option == 1){
            $relation = app('App\Http\Controllers\Pasien\Pasien\EditController')
            ->relatives($new_relative_id,$id,$pasien_relationship);
        }


            DB::commit();
            $status = 1;
            $message = 'Data pasin berhasil diubah';
            $title = 'Berhasil!';

            return redirect('pasien/'.$id)
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status);



        }

        catch (\Exception $e) {
            DB::rollBack();


            $status = 0;
            $message = 'Pasien gagal didaftarkan';
            $title = 'Terjadi Kesalahan!';
            
            return redirect('pasien/')
            ->with('message', $message)
            ->with('title',$title)
            ->with('status', $status);


        }
    }
}
