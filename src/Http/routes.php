<?php
Route::group(['middleware' => ['web']], function() {
    /* CV Admin */
    Route::resource('cvadmin', '\Escuccim\Resume\Http\Controllers\JobsController');
    Route::get('cvadmin/{id}/delete', '\Escuccim\Resume\Http\Controllers\JobsController@delete');
    Route::post('cvadmin/order', '\Escuccim\Resume\Http\Controllers\JobsController@order');

    /* Education Admin */
    Route::resource('education', '\Escuccim\Resume\Http\Controllers\EducationController');
});