<?php 
Route::group(['prefix' => 'api/daftarharga'], function() {
	Route::get('/get', 'Hospital\DaftarHarga\ReadController@get');
});

?>