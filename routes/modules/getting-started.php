<?php

Route::group(['prefix' => 'getting-started'], function() {
	Route::get('/', 'GettingStarted\ViewController@profesi');
	Route::get('/profesi', 'GettingStarted\ViewController@profesi');
	Route::get('/avatar', 'GettingStarted\ViewController@avatar');

	Route::post('/profesi', 'GettingStarted\PostController@profesi');
	Route::post('/avatar', 'GettingStarted\PostController@avatar');
});

?>