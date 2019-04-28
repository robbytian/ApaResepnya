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
Route::auth();
Route::get('/','homeController@index');
Route::get('SearchData','searchController@allSearch')->name('search.all');
Route::get('masakan','masakanController@index');
Route::get('masakan/filter/{filter}','masakanController@filter');
Route::get('minuman','minumanController@index');
Route::get('cemilan','cemilanController@index');
Route::get('artikel','artikelController@index');
Route::get('register','userController@indexRegister');
Route::post('register','userController@register');
Route::post('registersosmed','UserSosmedController@register');
Route::get('forgotpassword','userController@forgot');
Route::post('forgotpassword','userController@forgot2')->name('lupaPassword');
Route::get('forgotpassword2','userController@forgot2');
Route::post('forgotpassword2','userController@forgot3')->name('lupaPassword2');
Route::get('forgotpassword3','userController@forgot3');
Route::post('forgotpassword3','userController@forgot4')->name('lupaPassword3');
Route::get('detailPost/{id}','detilPostController@resep');
Route::get('detailArtikel/{id}','detilPostController@artikel');
Route::get('/filterMasakan', 'masakanController@filter')->name('masakan.filter');
Route::get('/filterMinuman', 'minumanController@filter')->name('minuman.filter');
Route::get('/filterCemilan', 'cemilanController@filter')->name('cemilan.filter');
Route::get('/filterArtikel', 'artikelController@filter')->name('artikel.filter');

Route::group(['middleware'=>'auth'], function(){
Route::get('buat_resep/{category}','BuatResepController@buatresep');
Route::post('buat_resep/{category}','BuatResepController@postresep');

Route::get('edit_resep/{id}','BuatResepController@editresep');
Route::patch('edit_resep/{id}','BuatResepController@update_resep');

Route::get('edit_artikel/{id}','artikelController@editartikel');
Route::patch('edit_artikel/{id}','artikelController@update_artikel');

// Route::get('masakan/buat_resep','masakanController@buatresep');
// Route::post('masakan/buat_resep','masakanController@postresep');
Route::delete('data_masakan/delete','masakanController@destroy')->name('masakan_delete');

// Route::get('minuman/buat_resep','minumanController@buatresep');
// Route::post('minuman/buat_resep','minumanController@postresep');
Route::delete('data_minuman/delete','minumanController@destroy')->name('minuman_delete');

// Route::get('cemilan/buat_resep','cemilanController@buatresep');
// Route::post('cemilan/buat_resep','cemilanController@postresep');
Route::delete('data_cemilan/delete','cemilanController@destroy')->name('cemilan_delete');

Route::get('artikel/buat_artikel','artikelController@buatartikel');
Route::post('artikel/buat_artikel','artikelController@postartikel');
Route::delete('data_artikel/delete','artikelController@destroy')->name('artikel_delete');

Route::get('profile','ProfileController@profile');
Route::get('ubah_profile','ProfileController@ubah_profile');
Route::patch('ubah_profile','ProfileController@update_profile');
Route::get('ubah_password','ProfileController@ubah_password');
Route::patch('ubah_password','ProfileController@update_password');

Route::get('admin/dashboard','adminController@index');
Route::get('admin/category','adminController@tambah_category');
Route::get('admin/data_masakan','adminController@data_masakan');
Route::delete('admin/resep/delete','adminController@hapusMasakan')->name('resep_delete_all');
Route::post('admin/resep/block','adminController@blockMasakan')->name('resep_block');
Route::post('admin/resep/unblock','adminController@unblockMasakan')->name('resep_unblock');
Route::get('admin/data_minuman','adminController@data_minuman');
Route::get('admin/data_cemilan','adminController@data_cemilan');
Route::delete('admin/data_artikel/delete','adminController@hapusArtikel')->name('artikel_delete_all');
Route::post('admin/data_artikel/block','adminController@blockArtikel')->name('artikel_block');
Route::post('admin/data_artikel/unblock','adminController@unblockArtikel')->name('artikel_unblock');
Route::get('admin/data_user','adminController@data_user');
Route::post('admin/data_user/block','adminController@blockUser')->name('akun_block');
Route::post('admin/data_user/unblock','adminController@unblockUser')->name('akun_unblock');
Route::get('admin/data_artikel','adminController@data_artikel');
Route::get('admin/riwayat_laporan','adminController@riwayat_laporan');
Route::post('admin/addcategory','adminController@addcategory');
Route::post('admin/addcategoryArtikel','adminController@addcategoryArtikel');

Route::get('data_masakan','dataPostController@masakan');
Route::get('data_minuman','dataPostController@minuman');
Route::get('data_cemilan','dataPostController@cemilan');
Route::get('data_artikel','dataPostController@artikel');
Route::get('riwayat_laporan','dataPostController@laporan');

Route::post('detailPost/{id}/Laporkan','detilPostController@laporResep');
Route::post('detailArtikel/{id}/Laporkan','detilPostController@laporArtikel');
Route::delete('riwayat_laporan/delete','dataPostController@Batallapor')->name('laporan_batal');

Route::post('likePost/{id}','detilPostController@like');
Route::delete('likePost/{id}','detilPostController@unlike');

Route::post('detailPost/{id}/comment','detilPostController@commentPost');
Route::post('detailArtikel/{id}/comment','detilPostController@commentArtikel');

Route::post('likeArtikel/{id}','detilPostController@like_artikel');
Route::delete('likeArtikel/{id}','detilPostController@unlike_artikel');

});

