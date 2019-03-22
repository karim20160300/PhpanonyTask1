<?php
//Namespace Admin Means the framwork will get All Controllers in the admin folder which we store Contollers in
Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function(){
	

	//Config Set To Handle MultiAuth
	Config::set('auth.defines','admin');
	Route::get('login','AdminAuthController@login');
	Route::post('login','AdminAuthController@loginPost');
	Route::get('forgotpassword', 'AdminAuthController@forgorPassword');
	Route::post('forgotpassword', 'AdminAuthController@forgorPasswordPost');
	Route::get('resetpassword/{token}','AdminAuthController@resetpassword');
	Route::post('resetpassword/{token}','AdminAuthController@resetpasswordPost');
	Route::get('changepassword','AdminController@changepassword');
	Route::Post('changepassword','AdminController@changepasswordPost');
	//Route To Make The Admin Log in First Before He Can Access The DashBoard
		              //MidleWare admin//guard => admin
	Route::group(['middleware' => 'admin:admin'], function(){
		Route::get('logout','AdminAuthController@logOut');
		Route::get('/', function(){
		return view('admin.home');
	});
		Route::get('setting','AdminController@setting');
		Route::post('setting', 'AdminController@settingPost');
		Route::get('showallcats','AdminController@showAllCats');
		Route::get('addnewcat', 'AdminController@addNewCat');
		Route::post('addnewcat', 'AdminController@addNewCatPost');
		Route::get('editcat/{id}','AdminController@editcat');
		Route::post('editcat/{id}','AdminController@editcatPost');
		Route::get('deletecat/{id}','AdminController@deletecat' );
		Route::get('showcat/{id}','AdminController@showcat');
	});

});