<?php 
Route::group(['prefix' => '/kasus/{nomor_kasus}'], function() {
	Route::get('/', 'Kasus\Home\ViewController@index');
	Route::get('/datamedis', 'Kasus\Kasus\ViewController@datamedis');
	Route::post('/datamedis/identitas/update', 'Kasus\Identitas\EditController@updateIdentitas');
	Route::post('/datamedis/identitas/medis/update', 'Kasus\Identitas\EditController@updateIdentitasMedis');

	Route::post('/datamedis/cppt/create', 'Kasus\CPPT\CreateController@createNewCPPT');
	Route::post('/datamedis/cppt/edit', 'Kasus\CPPT\PostController@editCPPT');
	Route::post('/datamedis/cppt/delete', 'Kasus\CPPT\PostController@deleteCPPT');
	Route::get('/datamedis/cppt/print/{id}', 'Kasus\CPPT\PostController@printCPPT');

	Route::post('/datamedis/diagnosis/create', 'Kasus\Diagnosis\CreateController@createNewDiagnosis');
	Route::post('/datamedis/diagnosis/delete', 'Kasus\Diagnosis\PostController@delete');

	Route::post('/datamedis/tindakan/create', 'Kasus\Tindakan\CreateController@createNewTindakan');
	Route::post('/datamedis/tindakan/delete', 'Kasus\Tindakan\DeleteController@delete');
	Route::post('/datamedis/tindakan/edit', 'Kasus\Tindakan\EditController@edit');

	Route::post('/datamedis/lokasi/create', 'Kasus\Lokasi\CreateController@createNewLokasi');

	Route::post('/datamedis/resep/create', 'Kasus\Resep\CreateController@createNewResep');
	Route::post('/datamedis/resep/edit', 'Kasus\Resep\EditController@editResep');
	Route::post('/datamedis/resep/delete', 'Kasus\Resep\DeleteController@deleteResep');
	Route::get('/datamedis/resep/print/{id}', 'Kasus\Resep\PostController@printResep');


	Route::post('/datamedis/gizi/create', 'Kasus\Gizi\CreateController@createNewPermintaanMakanan');

	Route::get('/penunjang', 'Kasus\Penunjang\ViewController@index');

	Route::post('/permintaan-penunjang/create', 'Kasus\PenunjangPermintaan\PostController@create');


	Route::get('/operasi', 'Kasus\Operasi\ViewController@index');
	Route::post('/operasi/permintaan', 'Kasus\Operasi\PostController@permintaan');

	Route::get('/tagihan', 'Kasus\Tagihan\ViewController@index');
	Route::post('/tagihan/checkout', 'Kasus\Tagihan\PostController@checkout');
	Route::get('/tagihan/print', 'Kasus\Tagihan\ViewController@print');
	Route::post('/tagihan-detail/create', 'Kasus\TagihanDetail\PostController@create');
	Route::post('/tagihan-detail/edit', 'Kasus\TagihanDetail\PostController@edit');
	Route::post('/tagihan-detail/delete', 'Kasus\TagihanDetail\PostController@delete');


	Route::get('/administrasi', 'Kasus\Administrasi\ViewController@index');
	Route::get('/administrasi/rawatinap/daftar', 'Kasus\Administrasi\PostController@rawatInapDaftar');
	Route::get('/administrasi/rawatinap/pindah', 'Kasus\Administrasi\PostController@rawatInapPindah');
	Route::get('/administrasi/rawatjalan/rujuk', 'Kasus\Administrasi\PostController@rawatJalanRujuk');
	Route::get('/administrasi/igd/pindah', 'Kasus\Administrasi\PostController@igdPindah');

	Route::get('/alat-bantu', 'Kasus\AlatBantu\ViewController@index');
	Route::get('/alat-bantu/mews', 'Kasus\AlatBantu\MEWS\ViewController@index');
	Route::post('/alat-bantu/mews/create', 'Kasus\AlatBantu\MEWS\PostController@create');

	Route::get('/alat-bantu/apgar', 'Kasus\AlatBantu\APGAR\ViewController@index');
	Route::post('/alat-bantu/apgar/create', 'Kasus\AlatBantu\APGAR\PostController@create');

	Route::get('/alat-bantu/poedji', 'Kasus\AlatBantu\Poedji\ViewController@index');
	Route::post('/alat-bantu/poedji/create', 'Kasus\AlatBantu\Poedji\PostController@create');

	Route::get('/kolaborator', 'Kasus\Kolaborator\ViewController@index');
	Route::post('/kolaborator/create', 'Kasus\Kolaborator\PostController@create');
	Route::post('/kolaborator/delete', 'Kasus\Kolaborator\PostController@delete');
	Route::post('/kolaborator/admin', 'Kasus\Kolaborator\EditController@admin');


	Route::get('/histori', 'Kasus\Histori\ViewController@index');
	
	Route::get('/pengaturan', 'Kasus\Pengaturan\ViewController@index');
	Route::post('/pengaturan/tutup-kasus', 'Kasus\Pengaturan\PostController@tutupKasus');

	Route::post('todo/new', 'Kasus\ToDo\PostController@new');

});

?>