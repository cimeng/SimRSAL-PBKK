<?php

Route::group(['prefix' => 'api/kasus/{nomor_kasus}'], function() {
	Route::get('/datamedis/cppt/{id}', 'Kasus\CPPT\ReadController@get');
	Route::get('/datamedis/tindakan/{id}', 'Kasus\Tindakan\ReadController@get');
	Route::get('/datamedis/resep/{id}', 'Kasus\Resep\ReadController@get');
	Route::get('/tagihan/detail/{id}', 'Kasus\TagihanDetail\ReadController@get');


	Route::get('/kolaborator/user/search/', 'Kasus\Kolaborator\ReadController@search');
	Route::post('/kolaborator/create/', 'Kasus\Kolaborator\CreateController@create');



	Route::post('/home/todo/done/{id}', 'Kasus\ToDo\EditController@done');
});


	Route::get('api/kasus/kolaborator/user/search', 'Kasus\Kolaborator\ReadController@search');
	Route::get('api/kasus/datamedis/resep/search', 'Kasus\Resep\ReadController@search');

?>