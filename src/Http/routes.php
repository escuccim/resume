<?php
Route::group(['middleware' => ['web']], function() {
    /* CV Admin */
    Route::resource('cvadmin', 'JobsController');
    Route::get('cvadmin/{id}/delete', 'JobsController@delete');
    Route::post('cvadmin/order', 'JobsController@order');

    /* Education Admin */
    Route::resource('education', 'EducationController');
});