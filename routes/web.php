<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

include('modules/hospital.php');
include('modules/getting-started.php');

Route::group(['middleware' => ['auth']], function () { 

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/kasus', 'Kasus\Kasus\ViewController@index');
	Route::get('/kasus/datamedis', 'Kasus\Kasus\ViewController@datamedis');
	Route::get('/diagnosis/search/{keyword}', 'Kasus\Diagnosis\ReadController@searchDiagnosisByKeyword');
	Route::get('/asuransi/search/{keyword}', 'Pasien\Asuransi\ReadController@searchAsuransiByKeyword');

	include('modules/kasus.php');
	include('modules-api/kasus.php');


	Route::group(['prefix' => '/warehouse'], function(){
		Route::get('/', 'Warehouse\Transaction\ViewController@today');

		Route::get('/transaction', 'Warehouse\Transaction\ViewController@index');
		Route::get('/transaction/today', 'Warehouse\Transaction\ViewController@today');
		Route::post('/transaction/accept', 'Warehouse\Transaction\EditController@accept');
		Route::post('/transaction/reject', 'Warehouse\Transaction\EditController@reject');
		Route::get('/transaction/edit/{id}', 'Warehouse\Transaction\ViewController@edit');
		Route::post('/transaction/edit', 'Warehouse\Transaction\EditController@edit');
		Route::post('/transaction/confirm', 'Warehouse\Transaction\EditController@confirm');
		Route::post('/transaction/delete', 'Warehouse\Transaction\DeleteController@delete');
		Route::get('/transaction/new', 'Warehouse\Transaction\ViewController@new');
		Route::post('/transaction/new', 'Warehouse\Transaction\CreateController@create');
		Route::get('/transaction/{id}', 'Warehouse\Transaction\ViewController@single');
		Route::get('/transaction/page/{page}', 'Warehouse\Transaction\ReadController@getPage');
		Route::post('/transaction/filter/{page}', 'Warehouse\Transaction\ReadController@filter');

		Route::get('/pengadaan', 'Warehouse\Pengadaan\ViewController@index');
		Route::get('/pengadaan/today', 'Warehouse\Pengadaan\ViewController@today');
		Route::post('/pengadaan/accept', 'Warehouse\Pengadaan\EditController@accept');
		Route::post('/pengadaan/reject', 'Warehouse\Pengadaan\EditController@reject');
		Route::get('/pengadaan/edit/{id}', 'Warehouse\Pengadaan\ViewController@edit');
		Route::post('/pengadaan/edit', 'Warehouse\Pengadaan\EditController@edit');
		Route::post('/pengadaan/confirm', 'Warehouse\Pengadaan\EditController@confirm');
		Route::post('/pengadaan/delete', 'Warehouse\Pengadaan\DeleteController@delete');
		Route::get('/pengadaan/new', 'Warehouse\Pengadaan\ViewController@new');
		Route::post('/pengadaan/new', 'Warehouse\Pengadaan\CreateController@create');
		Route::get('/pengadaan/{id}', 'Warehouse\Pengadaan\ViewController@single');
		Route::get('/pengadaan/page/{page}', 'Warehouse\Pengadaan\ReadController@getPage');
		Route::post('/pengadaan/filter/{page}', 'Warehouse\Pengadaan\ReadController@filter');

		Route::get('/item/create', 'Warehouse\Items\ViewController@create');
		Route::post('/item', 'Warehouse\Items\CreateController@create');
		Route::get('/item', 'Warehouse\Items\ViewController@index');
		Route::get('/item/log', 'Warehouse\Items\ViewController@log');
		Route::get('/item/edit/{item_slug}', 'Warehouse\Items\ViewController@editSingle');
		Route::get('/item/search', 'Warehouse\Items\ViewController@search');
		Route::post('/item/edit', 'Warehouse\Items\EditController@updateItem');
		Route::post('/item/delete', 'Warehouse\Items\DeleteController@delete');
		Route::get('/item/page/{page}', 'Warehouse\Items\ReadController@getPage');
		Route::post('/item/search/{page}', 'Warehouse\Items\ReadController@getItemSearch');
		Route::get('/item/search/{key}', 'Warehouse\Items\ReadController@getNameSearch');
		Route::get('/item/supplier/{supp}', 'Warehouse\Items\ReadController@getItemListBySupplier');
		Route::get('/item/list', 'Warehouse\Items\ReadController@getItemList');
		Route::get('/item/{item_slug}', 'Warehouse\Items\ViewController@getSingle');
		Route::get('/item/{id}/{page}', 'Warehouse\ItemsLog\ReadController@getItemLog');
		Route::get('/itemavail/{id}/{page}', 'Warehouse\ItemsLog\ReadController@getAvailable');

		Route::get('/log/page/{page}','Warehouse\ItemsLog\ReadController@getPage');
		Route::get('/log/purchase/{id}','Warehouse\ItemsRecord\ReadController@getPurchase');
		Route::post('/log/filter/{page}','Warehouse\ItemsLog\ReadController@getFilter');
		Route::get('/category', 'Warehouse\Category\ViewController@index');
		//Route::get('/category/{cat}', 'Warehouse\Category\ViewController@category');
		Route::get('/category/new', 'Warehouse\Category\ViewController@create');
		Route::post('/category/new', 'Warehouse\Category\CreateController@create');

		Route::get('/supplier', 'Warehouse\Supplier\ViewController@index');
		Route::get('/supplier/new', 'Warehouse\Supplier\ViewController@create');
		Route::get('/supplier/get', 'Warehouse\Supplier\ReadController@getAll');
		Route::post('/supplier/new', 'Warehouse\Supplier\CreateController@create');
		Route::post('/supplier/delete', 'Warehouse\Supplier\DeleteController@delete');
		Route::get('/supplier/edit/{supplier_id}', 'Warehouse\Supplier\ViewController@edit');
		Route::post('/supplier/edit', 'Warehouse\Supplier\EditController@update');
		Route::get('/supplier/{slug}', 'Warehouse\Supplier\ViewController@single');
		Route::get('/supplier/search/{key}', 'Warehouse\Supplier\ReadController@searchSupplier');
		Route::get('/supplier/page/{page}', 'Warehouse\Supplier\ReadController@getPage');
		Route::get('/supplier/item/{id}', 'Warehouse\Items\ReadController@getItemBySupplier');
		Route::get('/supplier/{id}/{page}', 'Warehouse\Transaction\ReadController@getTransactionBySupplier');
	});

Route::group(['prefix' => '/apotek'], function(){
	Route::get('/', 'Apotek\Pharmacy\ViewController@index');
	Route::get('/new', 'Apotek\Pharmacy\ViewController@create');
	Route::post('/new', 'Apotek\Pharmacy\CreateController@create');
	Route::get('/pharmacy/get', 'Apotek\Pharmacy\ReadController@getAll');	
	Route::get('/search/{key}', 'Apotek\Pharmacy\ReadController@searchPharmacy');	

	Route::get('/{slug}', 'Apotek\TransaksiObat\ViewController@index');
	Route::get('/{slug}/transaction', 'Apotek\Transaction\ViewController@index');
	Route::get('/{slug}/transaction/today', 'Apotek\Transaction\ViewController@today');
	Route::post('/{slug}/transaction/accept', 'Apotek\Transaction\EditController@accept');
	Route::post('/{slug}/transaction/reject', 'Apotek\Transaction\EditController@reject');
	Route::get('/{slug}/transaction/edit/{id}', 'Apotek\Transaction\ViewController@edit');
	Route::post('/{slug}/transaction/edit', 'Apotek\Transaction\EditController@edit');
	Route::get('/{slug}/transaction/confirm/{id}', 'Apotek\Transaction\ViewController@confirm');
	Route::post('/{slug}/transaction/accept', 'Apotek\Transaction\EditController@accept');
	Route::post('/{slug}/transaction/delete', 'Apotek\Transaction\DeleteController@delete');
	Route::get('/{slug}/transaction/new', 'Apotek\Transaction\ViewController@new');
	Route::post('/{slug}/transaction/new', 'Apotek\Transaction\CreateController@create');
	Route::get('/{slug}/transaction/{id}', 'Apotek\Transaction\ViewController@single');
	Route::get('/{slug}/transaction/page/{page}', 'Apotek\Transaction\ReadController@getPage');
	Route::post('/{slug}/transaction/filter/{page}', 'Apotek\Transaction\ReadController@filter');

	Route::get('/{slug}/transaksi-obat/tambah', 'Apotek\TransaksiObat\ViewController@new');
	Route::get('/{slug}/transaksi-obat', 'Apotek\TransaksiObat\ViewController@index');
	Route::get('/{slug}/transaksi-obat/today', 'Apotek\TransaksiObat\ViewController@today');
	Route::get('/{slug}/transaksi-obat/histori', 'Apotek\TransaksiObat\ViewController@today');
	Route::get('/{slug}/transaksi-obat/histori/{date}', 'Apotek\TransaksiObat\ViewController@histori');
	Route::post('/{slug}/transaksi-obat/payment', 'Apotek\TransaksiObat\EditController@payment');
	Route::get('/{slug}/transaksi-obat/edit/{id}', 'Apotek\TransaksiObat\ViewController@edit');
	Route::post('/{slug}/transaksi-obat/edit', 'Apotek\TransaksiObat\EditController@edit');
	Route::post('/{slug}/transaksi-obat/delete', 'Apotek\TransaksiObat\DeleteController@delete');
	Route::post('/{slug}/transaksi-obat/reject', 'Apotek\TransaksiObat\EditController@reject');
	Route::get('/{slug}/transaksi-obat/pasien', 'Apotek\TransaksiObat\ViewController@pasien');
	Route::get('/{slug}/transaksi-obat/new/{id}', 'Apotek\TransaksiObat\ViewController@new');
	Route::get('/{slug}/transaksi-obat/obat', 'Apotek\Items\ReadController@getAll'); 	// tes buat autocomplete
	Route::post('/{slug}/transaksi-obat/new', 'Apotek\TransaksiObat\CreateController@create');
	Route::get('/{slug}/transaksi-obat/{id}', 'Apotek\TransaksiObat\ViewController@single');
	Route::get('/{slug}/transaksi-obat/{id}/pembayaran', 'Apotek\TransaksiObat\ViewController@payment');
	Route::get('/{slug}/transaksi-obat/{id}/confirm', 'Apotek\TransaksiObat\ViewController@confirm');
	Route::get('/{slug}/transaksi-obat/page/{page}', 'Apotek\TransaksiObat\ReadController@getPage');
	Route::post('/{slug}/transaksi-obat/filter/{page}', 'Apotek\TransaksiObat\ReadController@filter');

	Route::get('/{slug}/item/create', 'Apotek\Items\ViewController@create');
	Route::post('/{slug}/item', 'Apotek\Items\CreateController@create');
	Route::get('/{slug}/item', 'Apotek\Items\ViewController@index');
	Route::get('/{slug}/item/log', 'Apotek\Items\ViewController@log');
	Route::get('/{slug}/item/edit/{item_slug}', 'Apotek\Items\ViewController@editSingle');
	Route::get('/{slug}/item/search', 'Apotek\Items\ViewController@search');
	Route::get('/{slug}/item/{item_slug}', 'Apotek\Items\ViewController@getSingle');
	Route::post('/{slug}/item/edit', 'Apotek\Items\EditController@updateItem');
	Route::post('/{slug}/item/delete', 'Apotek\Items\DeleteController@delete');
	Route::get('/{slug}/item/page/{page}', 'Apotek\Items\ReadController@getPage');
	Route::post('/{slug}/item/search/{page}', 'Apotek\Items\ReadController@getItemSearch');
	Route::get('/{slug}/item/search', 'Apotek\Items\ReadController@getNameSearch');
	Route::get('/{slug}/item/{id}/{page}', 'Apotek\Items\ReadController@getItemLog');
	Route::get('/{slug}/itemavail/{id}/{page}', 'Apotek\ItemsLog\ReadController@getAvailable');

	Route::get('/{slug}/log/page/{page}','Apotek\ItemsLog\ReadController@getPage');
	Route::post('/{slug}/log/filter/{page}','Apotek\ItemsLog\ReadController@getFilter');
	Route::get('/{slug}/log/purchase/{id}','Apotek\ItemsRecord\ReadController@getPurchase');
});


Route::group(['prefix' => 'pasien'], function(){
	Route::get('', 'Pasien\Pasien\ViewController@listPasien');
	Route::get('statistik', 'Pasien\Pasien\ViewController@index');
	Route::get('baru', 'Pasien\Pasien\ViewController@new');
	Route::get('list-pasien', 'Pasien\Pasien\ViewController@listPasien');
	Route::post('baru', 'Pasien\Pasien\PostController@createPasien');
	Route::get('{id}', 'Pasien\Pasien\ViewController@profile');
	Route::get('{id}/edit', 'Pasien\Pasien\ViewController@edit');
	Route::post('{id}/edit', 'Pasien\Pasien\PostController@editPasien');
	Route::get('{id}/edit/kerabat', 'Pasien\Pasien\ViewController@editKerabat');
	Route::post('{id}/edit/kerabat', 'Pasien\Pasien\PostController@editKerabat');
});

Route::group(['prefix' => 'api/pasien'], function(){
	Route::get('/get', 'Pasien\Pasien\ReadController@get');
	Route::post('/baru', 'Pasien\Pasien\PostController@APICreatePasien');
	Route::post('/edit', 'Pasien\Pasien\PostController@APIEditPasien');
	Route::post('/kerabat/edit', 'Pasien\PasienWali\EditController@APIEditKerabatPasien');
	Route::get('/alamat/kota/get', 'Pasien\AlamatKota\ReadController@get');
	Route::get('/alamat/kecamatan/get/{id}', 'Pasien\AlamatKecamatan\ReadController@get');
	Route::get('/asuransi/perusahaan/get', 'Pasien\Asuransi\ReadController@getAll');
	Route::get('/kerjasama/perusahaan/get', 'Pasien\PerusahaanKerjasama\ReadController@getAll');
});





Route::group(['prefix' => 'api'], function(){
	Route::get('/user', 'Users\ReadController@index');
	Route::get('/user/search', 'Users\ReadController@search');
});

Route::group(['prefix' => 'nutrition'], function() {
	Route::group(['prefix' => 'recipe'], function() {
		Route::get('/create', 'Nutrition\Recipe\CreateController@index');
		Route::post('/store', 'Nutrition\Recipe\CreateController@store');
		Route::get('/show', 'Nutrition\Recipe\ViewController@index');
		Route::get('/edit/{id_recipe}', 'Nutrition\Recipe\EditController@index');
		Route::post('/update/{id_recipe}', 'Nutrition\Recipe\EditController@update');
		Route::get('/delete/{id_class_recipe}', 'Nutrition\Recipe\DeleteController@index');
		Route::get('/print/{id_recipe}', 'Nutrition\Recipe\InvoiceController@index');

		Route::get('/reloadorder/{ket}', 'Nutrition\Recipe\ViewController@reloadorder');

		Route::get('/foodperday', 'Nutrition\Recipe\ViewController@foodperday');
	});

	Route::group(['prefix' => 'ingredients'], function() {
		Route::get('/create', 'Nutrition\Ingredients\CreateController@index');
		Route::post('/store', 'Nutrition\Ingredients\CreateController@store');
		Route::get('/show', 'Nutrition\Ingredients\ViewController@index');
		route::get('/edit/{id_ingredients}', 'Nutrition\Ingredients\EditController@index');
		Route::post('/update/{id_ingredients}', 'Nutrition\Ingredients\EditController@update');
		Route::get('/delete/{id_ingredients}', 'Nutrition\Ingredients\DeleteController@index');
	});

	Route::group(['prefix' => 'order'], function() {
		Route::get('/create', 'Nutrition\Order\CreateController@index');
		Route::get('/getbangsal/{kelas_id}', 'Nutrition\Order\CreateController@getbangsal');
		Route::get('/getruangan/{bangsal_id}', 'Nutrition\Order\CreateController@getruangan');
		Route::get('/ajax_biasa/{id_diet}', 'Nutrition\Order\CreateController@ajax_biasa');
		Route::get('/reloadorder/{ket}', 'Nutrition\Order\ViewController@ReloadOrder');
		Route::get('/getordermenu/{ket}', 'Nutrition\Order\ViewController@getOrderMenu');
		Route::get('/energy_source/{id_diet_Selection}', 'Nutrition\Order\CreateController@energy_source');
		Route::get('/energy_source_detail/{id_diet_detail_energy_sources}', 'Nutrition\Order\CreateController@energy_source_detail');
		Route::get('/get_name/{id_diet_detail_energy_sources}', 'Nutrition\Order\CreateController@source_energy_name');

			//invoice
		Route::get('/invoice/{id_order}', 'Nutrition\Order\InvoiceController@invoice');
		Route::get('/invoice/pdf/{id_order}', 'Nutrition\Order\InvoiceController@downloadPDF');
		Route::get('/invoice/printlabel/{id_order}', 'Nutrition\Order\InvoiceController@print_label');
		Route::get('/invoice/print/label', 'Nutrition\Order\InvoiceController@print_all_label');

		Route::post('/store', 'Nutrition\Order\CreateController@store');
		Route::get('/show', 'Nutrition\Order\ViewController@index');
		Route::get('/show/detail/{id_order}', 'Nutrition\Order\ViewController@detail');
		Route::post('/show/detail/order/{id_order}', 'Nutrition\Order\EditController@order');
		Route::get('/show/now', 'Nutrition\Order\ViewController@pengantaran');
		Route::post('/show/pengantaran', 'Nutrition\Order\ViewController@now');
		Route::get('/delete/{id_order}', 'Nutrition\Order\DeleteController@index');

		Route::get('/mustbuy', 'Nutrition\Order\MustBuyController@index');
		Route::get('/mustbuy/{id_buy_list}', 'Nutrition\Order\MustBuyController@afterbuy');

			//recap
		Route::get('/show/recap', 'Nutrition\Order\ViewController@recap');
		Route::get('/show/recap/time', 'Nutrition\Order\ViewController@recapbytime');

			//data pasien
		Route::get('/patientdata/{name}', 'Nutrition\Order\CreateController@patient_data');

		Route::get('/ajaxfood/{a}', 'Nutrition\Order\ViewController@ajax_food');
		Route::get('/ajaxbangsal/{input_bangsal}', 'Nutrition\Order\ViewController@ajax_bangsal');
		Route::get('/ajaxruangan/{input_ruangan}', 'Nutrition\Order\ViewController@ajax_ruangan');
		Route::get('/searchajax',array('as'=>'searchajax','uses'=>'Nutrition\Order\ViewController@autocomplete'));
		Route::get('/cari', 'Nutrition\Order\ViewController@loaddata');

		//pengantaran
		Route::get('/reloadpengantaran/{ket}/{bangsal}/{ruangan}', 'Nutrition\Order\ViewController@reloadpengantaran');
		Route::get('/updatepengantaran/{id_order}/{status}', 'Nutrition\Order\ViewController@updatepengantaran');

		Route::get('/dummy', 'Nutrition\Order\CreateController@dummy');

	});

	Route::group(['prefix' => 'stock'], function() {
		Route::get('/show', 'Nutrition\Stock\ViewController@index');
		Route::get('/edit/{id_stock}', 'Nutrition\Stock\EditController@index');
		Route::post('/update/{id_stock}', 'Nutrition\Stock\EditController@update');
		Route::get('/recap', 'Nutrition\Stock\ViewController@recap');
	});

	Route::group(['prefix' => 'transaction'], function() {
			//create history buy list
		Route::get('/create/{id_buy_list}', 'Nutrition\Transaction\CreateController@index');
		Route::get('/add', 'Nutrition\Transaction\CreateController@new');
		Route::post('/store', 'Nutrition\Transaction\CreateController@store');
		Route::get('/show', 'Nutrition\Transaction\ViewController@index');
		Route::get('/show/recap', 'Nutrition\Transaction\ViewController@recap');
		Route::get('/show/history/{date}', 'Nutrition\Transaction\ViewController@getRecapbyDate');
		Route::get('/edit/{id_transaction}', 'Nutrition\Transaction\EditController@index');
		Route::post('/update/{id_transaction}', 'Nutrition\Transaction\EditController@update');
		Route::get('/delete/{id_transaction}', 'Nutrition\Transaction\DeleteController@index');
	});

	Route::group(['prefix' => 'buy_list'], function() {
		Route::post('/create', 'Nutrition\Transaction\CreateController@add_buy_list');
		Route::post('/create/new', 'Nutrition\Transaction\CreateController@add_new_buy_list');
		Route::get('/detail/{id_buy_list}', 'Nutrition\Transaction\ViewController@detail_buylist');
	});

	Route::group(['prefix' => 'production'], function() {
		Route::get('/today', 'Nutrition\Production\CreateController@index');
		Route::get('/create', 'Nutrition\Production\CreateController@create');
		Route::post('/store', 'Nutrition\Production\CreateController@store');
		Route::get('/show', 'Nutrition\Production\ViewController@index');
		Route::get('/edit/{id_production}', 'Nutrition\Production\EditController@index');
		Route::post('/update/{id_production}', 'Nutrition\Production\EditController@update');
		Route::get('/delete/{id_production}', 'Nutrition\Production\DeleteController@index');

		Route::get('/ajax_production/{id_production}', 'Nutrition\Production\CreateController@ajax_production');

		Route::get('/ordertoday', 'Nutrition\Production\ViewController@ordertoday');
		Route::get('/showtoday', 'Nutrition\Production\ViewController@showtoday');
		Route::get('/show/detail/{id_production}', 'Nutrition\Production\ViewController@showdetail');

		Route::get('/invoicefood', 'Nutrition\Production\InvoiceController@invoicefood');
		Route::get('/invoiceingredients', 'Nutrition\Production\InvoiceController@invoiceingredients');
		Route::get('/print/{id_production}', 'Nutrition\Production\InvoiceController@printdetail');	
	});
});

Route::group(['prefix' => 'kepegawaian'], function() {
	Route::get('/','Kepegawaian\ViewController@index');

	Route::group(['prefix' => 'pegawai'], function(){
		Route::get('/','Kepegawaian\Pegawai\ViewController@index');
		Route::get('/add','Kepegawaian\Pegawai\ViewController@addpegawai');
		Route::post('/add','Kepegawaian\Pegawai\CreateController@create');
		Route::get('/detail/{id_pegawai}','Kepegawaian\Pegawai\ReadController@detailpegawai');


		Route::get('/edit/{id_pegawai}','Kepegawaian\Pegawai\EditController@index');
		Route::post('/edit/data/{id_pegawai}','Kepegawaian\Pegawai\EditController@edit');
		Route::get('/{ktp}/pencapaian', 'Kepegawaian\Pegawai\ViewController@pencapaianpegawai');

		//profile
		Route::group(['prefix' => 'profile'], function() {
			Route::get('/{id_pegawai}', 'Kepegawaian\Pegawai\Profile\ViewController@profile');
			Route::get('/update/{id_pegawai}', 'Kepegawaian\Pegawai\Profile\ViewController@edit');
			Route::post('/update/{id_pegawai}', 'Kepegawaian\Pegawai\Profile\EditController@update');
		});

		//pencapaian
		Route::group(['prefix' => 'pencapaian'], function(){
			Route::get('/', 'Kepegawaian\Pegawai\ViewController@laporanpencapaian');
			Route::get('/add', 'Kepegawaian\Pegawai\ViewController@addpencapaian');
			Route::post('/add','Kepegawaian\Pegawai\CreateController@pencapaian');
			Route::post('/upload/add/{id_pencapaian}', 'Kepegawaian\Pegawai\CreateController@uploadpencapaian');
			Route::get('/{id_pencapaian}/detail', 'Kepegawaian\Pegawai\ViewController@detailpencapaian');
			Route::get('/detail/upload/{id_pegawai}', 'Kepegawaian\Pegawai\ViewController@uploadpencapaian');
			Route::get('/detail/lihatlaporan/{id_pencapaian}', 'Kepegawaian\Pegawai\ViewController@lihatlaporan');
			Route::get('/search', 'Kepegawaian\Pegawai\ViewController@searchpencapaian');
		});

		//promosi dan sanksi
		Route::get('/promosi-sanksi', 'Kepegawaian\Pegawai\PromosiSanksi\ViewController@index');
		Route::get('/add/promosi', 'Kepegawaian\Pegawai\PromosiSanksi\ViewController@addpromosi');
		Route::post('/add/promosi', 'Kepegawaian\Pegawai\PromosiSanksi\CreateController@createpromosi');
		Route::get('/add/sanksi', 'Kepegawaian\Pegawai\PromosiSanksi\ViewController@addsanksi');

		// ajax
		Route::get('/get-jabatan/{id_departemen}', 'Kepegawaian\Pegawai\ReadController@ajaxjabatan');
		Route::get('/get-pegawai/{id_jabatan}', 'Kepegawaian\Pegawai\ReadController@ajaxpegawai');

		//promosi
		Route::get('/promosi', 'Kepegawaian\Pegawai\ViewController@promosi');
		Route::post('/promosi/add/', 'Kepegawaian\Pegawai\CreateController@promosi');

		//sanksi
		Route::get('/sanksi', 'Kepegawaian\Pegawai\ViewController@sanksi');
		Route::post('/sanksi/add/', 'Kepegawaian\Pegawai\CreateController@sanksi');

		//sanksi dan promosi
		Route::get('/sanksipromosi', 'Kepegawaian\Pegawai\ViewController@sanksipromosi');

		//ajax
		Route::get('/getdatapegawai/{nama}', 'Kepegawaian\Pegawai\ReadController@findpegawai');
		Route::get('/getjabatan/{id_departemen}', 'Kepegawaian\Pegawai\ReadController@getjabatan');
		Route::get('/getkecamatan/{id_kota}', 'Kepegawaian\Pegawai\ReadController@getkecamatan');
		Route::get('/getpegawai/{id_jabatan}', 'Kepegawaian\Pegawai\ReadController@getpegawai');

		//dummy
		Route::get('/dummy', 'Kepegawaian\Pegawai\CreateController@dummy');
	});

	Route::group(['prefix' => 'departemen'], function(){
		Route::get('/', 'Kepegawaian\Departemen\ViewController@index');
		Route::get('/add','Kepegawaian\Departemen\ViewController@adddepartemen');
		Route::post('/add','Kepegawaian\Departemen\CreateController@create');
		Route::get('/detail/{id_departemen}','Kepegawaian\Departemen\ViewController@detail');
		Route::post('/edit/{id_departemen}','Kepegawaian\Departemen\EditController@edit');

		// Route::get('/detailpegawai/{id_jabatan}', 'Kepegawaian\Departemen\ViewController@detailpegawai');
	});
});

Route::group(['prefix' => 'radiologi'], function(){
	Route::group(['prefix' => 'layanan'], function(){
		Route::get('/', 'Radiology\Service\ViewController@index');
		Route::get('/baru', 'Radiology\Service\ViewController@create');
			Route::post('/', 'Radiology\Service\CreateController@new');			//ONLY DUMMY 
			Route::post('/update', 'Radiology\Service\EditController@update');
			Route::post('/hapus', 'Radiology\Service\DeleteController@delete');
		});
	Route::group(['prefix' => 'transaksi'], function(){
		Route::get('/', 'Radiology\Transaction\ViewController@index');
		Route::post('/filter', 'Radiology\Transaction\ReadController@datatablesUnread');
		Route::post('/', 'Radiology\Transaction\CreateController@create');
		Route::get('/hasil', 'Radiology\Transaction\ViewController@hasil');
		Route::get('/rekap', 'Radiology\Transaction\ViewController@rekap');
		Route::get('/rekap/filter', 'Radiology\Transaction\ReadController@getRekap');
		Route::get('/periksa/{slug}', 'Radiology\Transaction\ViewController@periksa');
		Route::get('/edit/{slug}', 'Radiology\Transaction\ViewController@editResult');
		Route::post('/periksa', 'Radiology\Transaction\CreateController@createResult');
		Route::post('/periksa/{slug}/batal', 'Radiology\Transaction\CreateController@inspectCancel');
		Route::post('/hapus/{slug}', 'Radiology\Transaction\DeleteController@deleteTransaction');
		Route::post('/edit', 'Radiology\Transaction\EditController@editTransaction');
			// Route::get('/hasil/{id}', 'Radiology\Result\ViewController@hasil');
			// Route::post('/hasil/upload', 'Radiology\Result\CreateController@createResult');
	});
		// Route::group(['prefix' => 'beranda'], function(){
		// 	Route::get('/', 'Radiology\Beranda\ViewController@index');
		// });
	Route::get('/dummyreq', 'Radiology\Transaction\ViewController@dummy');
	Route::get('/dummins/{typeInsurance}', 'Radiology\Transaction\ReadController@getByInsurance');

	Route::group(['prefix' => 'api'], function(){
		Route::get('services', 'Radiology\Service\ReadController@getAll');
		Route::post('transaksi', 'Radiology\Transaction\CreateController@apiCreate');
	});

});

Route::group(['prefix' => 'rawatjalan'], function(){
	Route::get('/', 'RawatJalan\Poliklinik\ViewController@index');
	Route::get('/statistik', 'RawatJalan\Statistik\ViewController@index');

	Route::group(['prefix' => 'poliklinik'], function(){
		Route::get('/', 'RawatJalan\Poliklinik\ViewController@index');
		Route::get('/antrian', 'RawatJalan\Transaksi\ViewController@all');
		Route::get('/antrian/baru', 'RawatJalan\Transaksi\ViewController@new');
		Route::get('/antrian/baru/{id}/{kasus_id?}', 'RawatJalan\Transaksi\PostController@createPasien');
		Route::post('/antrian/baru/konfirmasi', 'RawatJalan\Transaksi\PostController@konfirmasiAntrian');
		Route::post('/antrian/baru/submit', 'RawatJalan\Transaksi\PostController@submitAntrian');
		Route::get('/{id}', 'RawatJalan\Transaksi\ViewController@index');

	});

	Route::group(['prefix' => 'pengaturan'], function(){
		Route::get('/', 'RawatJalan\Pengaturan\Poliklinik\ViewController@index');
		Route::get('/poliklinik/new', 'RawatJalan\Pengaturan\Poliklinik\ViewController@new');
		Route::get('/poliklinik/edit/{id}', 'RawatJalan\Pengaturan\Poliklinik\ViewController@edit');

		Route::post('/poliklinik/new', 'RawatJalan\Pengaturan\Poliklinik\PostController@create');
		Route::post('/poliklinik/edit/{id}', 'RawatJalan\Pengaturan\Poliklinik\PostController@edit');
		Route::post('/poliklinik/delete/{id}', 'RawatJalan\Pengaturan\Poliklinik\PostController@delete');
	});
	Route::group(['prefix' => 'transaksi'], function(){
		Route::post('/layani', 'RawatJalan\Transaksi\PostController@layaniPasien');
	});

	Route::get('/histori-transaksi', 'RawatJalan\Histori\ViewController@index');
});

Route::group(['prefix' => 'api/rawatjalan'], function(){
	Route::get('/transaksi/get', 'RawatJalan\Transaksi\ReadController@APIHistori');
});

Route::group(['prefix' => 'rawatinap'], function(){
	Route::get('/', 'RawatInap\Bangsal\ViewController@index');
	Route::get('/statistik', 'RawatInap\Statistik\ViewController@index');

	Route::group(['prefix' => 'bangsal'], function(){
		Route::get('/', 'RawatInap\Bangsal\ViewController@index');
		Route::get('/{slug}', 'RawatInap\Bangsal\ViewController@single');
	});


	Route::group(['prefix' => 'transaksi'], function(){
		Route::get('/', 'RawatInap\Transaksi\ViewController@pendaftaran');

		Route::get('/pendaftaran', 'RawatInap\Transaksi\ViewController@pendaftaran');
		Route::get('/pendaftaran/pasien', 'RawatInap\Transaksi\ViewController@pendaftaranPasien');
		Route::get('/pendaftaran/pasien/{id}', 'RawatInap\Transaksi\PostController@pendaftaranPasien');

		Route::get('/pendaftaran/ruangan', 'RawatInap\Transaksi\ViewController@pendaftaranRuangan');
		Route::post('/pendaftaran/konfirmasi', 'RawatInap\Transaksi\PostController@pendaftaranKonfirmasi');
		Route::post('/pendaftaran/submit', 'RawatInap\Transaksi\PostController@pendaftaranSubmit');
		Route::post('/pendaftaran/tolak', 'RawatInap\Transaksi\PostController@pendaftaranTolak');
	});



	Route::group(['prefix' => 'pengaturan'], function(){
		Route::get('/', 'RawatInap\Pengaturan\Bangsal\ViewController@index');
		Route::get('/bangsal', 'RawatInap\Pengaturan\Bangsal\ViewController@index');
		Route::get('/bangsal/new', 'RawatInap\Pengaturan\Bangsal\ViewController@new');
		Route::post('/bangsal/new', 'RawatInap\Pengaturan\Bangsal\PostController@new');
		Route::get('/bangsal/{id}', 'RawatInap\Pengaturan\Bangsal\ViewController@single');
		Route::get('/bangsal/edit/{id}', 'RawatInap\Pengaturan\Bangsal\ViewController@edit');
		Route::post('/bangsal/edit/', 'RawatInap\Pengaturan\Bangsal\PostController@edit');
		Route::post('/bangsal/delete/', 'RawatInap\Pengaturan\Bangsal\PostController@delete');

		Route::post('/ruangan/new', 'RawatInap\Pengaturan\Ruangan\PostController@new');
		Route::get('/ruangan/{id}', 'RawatInap\Pengaturan\Ruangan\ViewController@single');
		Route::post('/ruangan/edit', 'RawatInap\Pengaturan\Ruangan\PostController@edit');
		Route::post('/ruangan/delete', 'RawatInap\Pengaturan\Ruangan\PostController@delete');

		Route::post('/bed/new', 'RawatInap\Pengaturan\TempatTidur\PostController@new');
		Route::post('/bed/edit', 'RawatInap\Pengaturan\TempatTidur\PostController@edit');
		Route::post('/bed/delete', 'RawatInap\Pengaturan\TempatTidur\PostController@delete');

	});


	Route::get('/histori-transaksi', 'RawatInap\Transaksi\ViewController@histori');


	Route::get('dummy/ruangan/setup','RawatInap\Main\DummyController@ruangan');
	Route::get('dummy/tempattidur/setup','RawatInap\Main\DummyController@tempattidur');
});


Route::group(['prefix' => 'api/rawatinap'], function(){
	Route::get('/transaksi/get', 'RawatInap\Transaksi\ReadController@APIHistori');
	Route::post('/tempattidur/kosong','RawatInap\TempatTidur\ReadController@apiRuanganKosong');
	Route::get('/tempattidur/kosong','RawatInap\TempatTidur\ReadController@apiRuanganKosong');
});



Route::group(['prefix' => '/aset'], function(){
	Route::get('/', function () {return view('aset/beranda');});

			//Kategori
	Route::get('/kategori/buat', 'Aset\Kategori\View@viewtambah');
	Route::post('/kategori/buat', 'Aset\Kategori\Post@tambah');
	Route::get('/kategori/daftar', 'Aset\Kategori\View@viewdaftar');

			//Supplier
	Route::get('/supplier/daftar', 'Aset\Supplier\View@viewdaftar');
	Route::get('/supplier/buat', 'Aset\Supplier\View@viewtambah');
	Route::get('/supplier/daftar/{id}', 'Aset\Supplier\View@viewsingle');
	Route::post('/supplier/buat', 'Aset\Supplier\Post@tambah');
	Route::post('/supplier/cari', 'Aset\Supplier\View@viewcari');


			//Transaksi
	Route::get('/transaksi/daftar', 'Aset\Transaksi\View@viewdaftar');
	Route::get('/transaksi/buat', 'Aset\Transaksi\View@viewtambah');
	Route::get('/transaksi/daftar/{id}', 'Aset\Transaksi\View@viewsingle');
	Route::post('/transaksi/buat', 'Aset\Transaksi\Post@tambah');
	Route::post('/transaksi/cari', 'Aset\Transaksi\View@viewcari');

			//template item

	Route::get('/template/daftar', 'Aset\ItemTemplate\View@viewdaftar');
	Route::get('/template/daftar/{id}', 'Aset\ItemTemplate\View@viewsingle');
	Route::post('/template/buat', 'Aset\ItemTemplate\Post@tambah');
	Route::get('/template/buat', 'Aset\ItemTemplate\View@viewtambah');
	Route::post('/template/cari', 'Aset\ItemTemplate\View@viewcari');

			//item
	Route::get('/item/daftar', 'Aset\Item\View@viewdaftar');
	Route::get('/item/daftar/{id}', 'Aset\Item\View@viewsingle');
	Route::post('/item/buat', 'Aset\Item\Post@tambah');
	Route::get('/item/buat', 'Aset\Item\View@viewtambah');
	Route::post('/item/cari', 'Aset\Item\View@viewcari');
	Route::get('/item/cari', 'Aset\Item\View@viewcari');


			//detail item

});


Route::group(['prefix' => 'kasir'], function(){
	Route::get('/transaksi', 'Kasir\Transaksi\ViewController@index');
	Route::get('/transaksi/invoice/{id}', 'Kasir\Transaksi\ViewController@invoice');
	Route::post('/transaksi/payment', 'Kasir\Transaksi\PostController@pay');
});

Route::group(['prefix' => 'igd'], function(){
	Route::get('/', 'IGD\Ruangan\ViewController@index');
	Route::group(['prefix' => 'ruangan'], function(){
		Route::get('/', 'IGD\Ruangan\ViewController@index');
		Route::post('/', 'IGD\Ruangan\CreateController@create');
		Route::get('/tambah', 'IGD\Ruangan\ViewController@tambah');
		Route::get('/{id}', 'IGD\Ruangan\ViewController@single');
	});
	Route::group(['prefix' => 'transaksi'], function(){
		Route::get('/baru', 'IGD\Transaksi\ViewController@new');
		Route::post('/baru/konfirmasi', 'IGD\Transaksi\PostController@konfirmasiRuangan');
		Route::post('/baru/submit', 'IGD\Transaksi\PostController@submitRuangan');
		Route::get('/baru/{id}/{kasus_id?}', 'IGD\Transaksi\PostController@createPasien');
	});

	Route::get('/histori-transaksi', 'IGD\Transaksi\ViewController@histori');

	Route::get('/pengaturan', 'IGD\Pengaturan\ViewController@index');
	Route::get('/pengaturan/ruangan/new', 'IGD\Pengaturan\ViewController@new');
	Route::get('/pengaturan/ruangan/edit/{id}', 'IGD\Pengaturan\ViewController@edit');

	Route::post('/pengaturan/ruangan/new', 'IGD\Pengaturan\PostController@new');
	Route::post('/pengaturan/ruangan/edit/{id}', 'IGD\Pengaturan\PostController@edit');
	Route::post('/pengaturan/ruangan/delete/{id}', 'IGD\Pengaturan\PostController@delete');
});


Route::group(['prefix' => 'api/igd'], function(){
	Route::get('/transaksi/get', 'IGD\Transaksi\ReadController@APIHistori');
});



Route::group(['prefix' => 'kamaroperasi'], function(){
	Route::get('/', 'KamarOperasi\Ruangan\ViewController@index');
	Route::get('/jadwal/rekap', 'KamarOperasi\Transaksi\ViewController@jadwalRekap');

	
	Route::get('/pendaftaran', 'KamarOperasi\Transaksi\ViewController@index');
	Route::get('/pendaftaran/{id}/{kasus_id?}', 'KamarOperasi\Transaksi\PostController@pendaftaranOperasi');
	Route::get('/pemesanan', 'KamarOperasi\Transaksi\ViewController@pemesanan');
	Route::get('/pemesanan/baru', 'KamarOperasi\Transaksi\ViewController@tanggal');
	Route::get('/pemesanan/tolak/{id}', 'KamarOperasi\Transaksi\DeleteController@pemesanan');

	Route::post('/pemesanan/{transaksi_id}/dokter', 'KamarOperasi\Transaksi\PostController@listdokter');
	Route::post('/pemesanan/{transaksi_id}/submit', 'KamarOperasi\Transaksi\PostController@submit');
	Route::post('/pemesanan/{transaksi_id}/konfirmasi', 'KamarOperasi\Transaksi\PostController@konfirmasiKamar');
	Route::get('/pemesanan/{transaksi_id}', 'KamarOperasi\Transaksi\PostController@pickdate');
	Route::post('/pemesanan/{transaksi_id}', 'KamarOperasi\Transaksi\PostController@listkamar');

	Route::group(['prefix' => 'pelaksanaan'], function(){
		Route::get('/{id}', 'KamarOperasi\Transaksi\ViewController@pasienHome');
		Route::get('/{id}/print/hasil', 'KamarOperasi\Transaksi\ViewController@printHasil');
		Route::post('/pasca', 'KamarOperasi\Transaksi\PostController@submitHasil');
		Route::post('/pengaturan', 'KamarOperasi\Transaksi\EditController@editDetail');
		Route::post('/pasca/obat', 'KamarOperasi\Pasca\CreateController@pascaObat');
		Route::post('/rencana/obat', 'KamarOperasi\Rencana\CreateController@rencanaObat');
		Route::post('/rencana/tim', 'KamarOperasi\Tim\CreateController@tambahTim');
		Route::get('/tim/hapus/{id}', 'KamarOperasi\Tim\DeleteController@anggota');
	});	

});

Route::group(['prefix' => 'ajax/kamaroperasi'], function(){
	Route::post('/jadwal', 'KamarOperasi\Transaksi\ReadController@ajaxGetJadwalKosong');
	Route::get('/jadwal/rekap', 'KamarOperasi\Transaksi\ReadController@ajaxGetJadwalRekap');
	Route::post('/transaksi', 'KamarOperasi\Transaksi\ReadController@ajaxGetTransaksi');
	Route::post('/rencana', 'KamarOperasi\Rencana\PostController@ajaxRencanaAdd');
	Route::post('/pasca', 'KamarOperasi\Pasca\PostController@ajaxPascaAdd');
	Route::post('/pengaturan', 'KamarOperasi\Transaksi\ReadController@ajaxRonde');
	Route::get('/dokter', 'KamarOperasi\Transaksi\ReadController@getdokter');
});

Route::group(['prefix' => 'api/dokter'], function(){
	Route::get('/get', 'KamarOperasi\Transaksi\ReadController@getdokter');
});



Route::group(['prefix' => 'keuangan'], function(){
	Route::get('/', 'Keuangan\Dashboard\ViewController@index');
	Route::get('/dashboard', 'Keuangan\Dashboard\ViewController@index');
	Route::get('/akun', 'Keuangan\Akun\ViewController@index');
	Route::get('/anggaran', 'Keuangan\Anggaran\ViewController@index');
	Route::get('/faktur', 'Keuangan\Faktur\ViewController@index');
	Route::get('/gaji', 'Keuangan\Gaji\ViewController@index');
	Route::get('/jasamedis', 'Keuangan\JasaMedis\ViewController@index');
	Route::get('/layanan', 'Keuangan\Layanan\ViewController@index');

	Route::get('/pemasukan', 'Keuangan\Pemasukan\ViewController@index');
	Route::get('/pemasukan/baru', 'Keuangan\Pemasukan\ViewController@create');
	Route::get('/pemasukan/{id}', 'Keuangan\Pemasukan\ViewController@single');
	Route::get('/pemasukan/edit/{id}', 'Keuangan\Pemasukan\ViewController@edit');
	Route::get('/pemasukan/delete/{id}', 'Keuangan\Pemasukan\DeleteController@delete');

	Route::get('/pengeluaran', 'Keuangan\Pengeluaran\ViewController@index');
	Route::get('/pengeluaran/baru', 'Keuangan\Pengeluaran\ViewController@create');
	Route::get('/pengeluaran/{id}', 'Keuangan\Pengeluaran\ViewController@single');
	Route::get('/pengeluaran/edit/{id}', 'Keuangan\Pengeluaran\ViewController@edit');
	Route::get('/pengeluaran/delete/{id}', 'Keuangan\Pengeluaran\DeleteController@delete');
	
	Route::get('/piutang', 'Keuangan\Piutang\ViewController@index');
	Route::get('/utang', 'Keuangan\Utang\ViewController@index');
	Route::get('/tarif', 'Keuangan\Tarif\ViewController@index');



});


Route::group(['prefix' => 'api/keuangan'], function(){
	Route::get('/layanan', 'Keuangan\Layanan\ReadController@get');
	Route::post('/pemasukan/baru', 'Keuangan\Pemasukan\PostController@apiSubmit');
	Route::post('/pemasukan/edit', 'Keuangan\Pemasukan\PostController@apiSubmit');
	Route::post('/pengeluaran/baru', 'Keuangan\Pengeluaran\PostController@apiSubmit');
	Route::post('/pengeluaran/edit', 'Keuangan\Pengeluaran\PostController@apiSubmit');

});

Route::group(['prefix' => 'labpk'], function(){
	Route::get('/', 'LabPK\Transaksi\ViewController@index');
	Route::get('/transaksi/{id}', 'LabPK\Transaksi\ViewController@single');
	Route::get('/transaksi/permintaan/{id}', 'LabPK\Transaksi\ViewController@permintaan');
	Route::get('/transaksi/pemeriksaan/{id}', 'LabPK\Transaksi\ViewController@pemeriksaan');
	Route::post('/transaksi/pemeriksaan/{id}/{detail_id}', 'LabPK\Transaksi\PostController@periksa');
	Route::get('/transaksi/hasil/{id}', 'LabPK\Transaksi\ViewController@hasil');
	Route::post('/transaksi/hasil/{id}', 'LabPK\Transaksi\PostController@simpanHasil');

	Route::get('/layanan', 'LabPK\Layanan\ViewController@index');
	Route::get('/layanan/create', 'LabPK\Layanan\ViewController@create');
	Route::post('/layanan/create', 'LabPK\Layanan\PostController@create');

	Route::get('/layanan-kategori', 'LabPK\LayananKategori\ViewController@index');
	Route::get('/layanan-kategori/create', 'LabPK\LayananKategori\ViewController@create');
	Route::post('/layanan-kategori/create', 'LabPK\LayananKategori\PostController@create');
});

}); /*CLOSE AUTH*/