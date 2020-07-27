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

Auth::routes(['verify' => true]);

// Route untuk pengguna
Route::get('/', function() {
	$user = Auth::user();

	if($user != null){
		if($user->status == '1'){
			if($user->level == 'admin'){
				return redirect('cms');
			} else {
				return redirect('home');
			}
		}	
	}else{
		return redirect('/home');
	}

});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'aduan'], function(){
	Route::get('/', 'AduanController@index');

	Route::get('/tambah', 'AduanController@tambah_form');
	Route::post('/tambah/proses', 'AduanController@tambah_proses');
	Route::get('/ubah/{id}', 'AduanController@ubah_form');
	Route::post('/ubah/proses/{id}', 'AduanController@ubah_proses');
	Route::get('/hapus/{id}', 'AduanController@hapus_proses');
});

Route::group(['prefix'=>'profil'], function(){
	Route::get('/', 'ProfilController@index');
	Route::post('/proses', 'ProfilController@submitProses');
});

Route::group(['prefix'=>'kontak'], function(){
	Route::get('/', 'ContactController@index');
	Route::post('/proses', 'ContactController@submit_proses');
});

Route::group(['prefix'=>'aduanverif'], function(){
	Route::get('/', 'AduanController@aduanverif');
});

// Route untuk Admin / CMS
Route::get('/cms', 'CmsHomeController@index')->middleware('CheckAdmin');
Route::get('/cms/aduan/nonverif', 'CmsAduanController@aduanNonVerif')->middleware('CheckAdmin');
Route::get('/cms/aduan/nonverif/ubah/{issue_id}', 'CmsAduanController@formAduanNonVerifUbah')->middleware('CheckAdmin');
Route::post('/cms/aduan/nonverif/ubah/{issue_id}', 'CmsAduanController@prosesAduanNonVerifUbah')->middleware('CheckAdmin');

Route::get('/cms/laporan/laporanditolak', 'LaporanterverifikasiController@laporanditolak')->middleware('CheckAdmin');
Route::get('/cms/laporan/laporanverifikasi', 'LaporanterverifikasiController@laporanverifikasi')->middleware('CheckAdmin');
Route::get('/cms/laporan/laporanselesai', 'LaporanterverifikasiController@laporanselesai')->middleware('CheckAdmin');

Route::get('/cms/aduan/verif', 'CmsAduanController@aduanVerif')->middleware('CheckAdmin');
Route::get('/cms/aduan/verif/detail/{issue_id}', 'CmsAduanController@aduanVerifDetail')->middleware('CheckAdmin');
Route::get('/cms/aduan/verif/publish/{issue_id}', 'CmsAduanController@aduanVerifPublish')->middleware('CheckAdmin');
Route::get('/cms/aduan/verif/ubah/{issue_id}', 'CmsAduanController@formAduanVerifUbah')->middleware('CheckAdmin');
Route::post('/cms/aduan/verif/ubah/{issue_id}', 'CmsAduanController@prosesAduanVerifUbah')->middleware('CheckAdmin');
Route::get('/cms/kontak', 'CmsContactController@index')->middleware('CheckAdmin');
Route::post('/cms/kontak', 'CmsContactController@proses')->middleware('CheckAdmin');

Route::get('/cms/pengaduan', function() {
	return 'hello pengaduan';
})->middleware('CheckAdmin');


Route::get('/content/cms/report/cetak_pdf','LaporanterverifikasiController@cetak_pdf')->name('report.cetak_pdf');








