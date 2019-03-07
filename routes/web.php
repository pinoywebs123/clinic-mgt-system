<?php



Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'auth'], function(){

		Route::post('/login', [
			'as'	=> 'login_check',
			'uses'	=> 'AuthController@login_check'
		]);
	

});


Route::group(['prefix'=> 'admin'], function(){

	Route::get('/home', [
		'as'	=> 'admin_home',
		'uses'	=> 'AdminController@admin_home'
	]);
		Route::post('/home', [
			'as'	=> 'admin_medicine_create',
			'uses'	=> 'AdminController@admin_medicine_create'
		]);
	Route::get('/medicine-edit/{id}', [
		'as'	=> 'admin_edit',
		'uses'	=> 'AdminController@admin_edit'
	]);	
		Route::post('/medicine-edit/{id}', [
			'as'	=> 'admin_edit_check',
			'uses'	=> 'AdminController@admin_edit_check'
		]);	
	Route::get('/medicine-quantity/{id}', [
		'as'	=> 'admin_quantity',
		'uses'	=> 'AdminController@admin_quantity'
	]);	
		Route::post('/medicine-quantity/{id}', [
			'as'	=> 'admin_quantity_check',
			'uses'	=> 'AdminController@admin_quantity_check'
		]);	

	Route::get('/logout', [
		'as'	=> 'admin_logout',
		'uses'	=> 'AdminController@admin_logout'
	]);



	//pasyente
	Route::get('/patient', [
		'as'	=> 'admin_patient',
		'uses'	=> 'AdminController@admin_patient'
	]);
		Route::post('/patient', [
			'as'	=> 'admin_patient_create',
			'uses'	=> 'AdminController@admin_patient_create'
		]);
	Route::get('/patient-edit/{id}', [
		'as'	=> 'admin_patient_edit',
		'uses'	=> 'AdminController@admin_patient_edit'
	]);
		Route::post('/patient-edit/{id}', [
			'as'	=> 'admin_patient_edit_check',
			'uses'	=> 'AdminController@admin_patient_edit_check'
		]);
	Route::get('/patient-medicine/{id}', [
		'as'	=> 'admin_patient_medicine',
		'uses'	=> 'AdminController@admin_patient_medicine'
	]);	
		Route::post('/patient-medicine/{user_id}/{medicine_id}', [
			'as'	=> 'admin_patient_medicine_check',
			'uses'	=> 'AdminController@admin_patient_medicine_check'
		]);
		Route::get('/patient-medicine-remove/{id}', [
			'as'	=> 'admin_patient_medicine_remove',
			'uses'	=> 'AdminController@admin_patient_medicine_remove'
		]);	
		Route::get('/patient-medicine-approved/{id}', [
			'as'	=> 'admin_patient_medicine_approved',
			'uses'	=> 'AdminController@admin_patient_medicine_approved'
		]);	



	//reporting
	Route::get('/reports', [
		'as'	=> 'admin_reports',
		'uses'	=> 'AdminController@admin_reports'
	]);
	


});
