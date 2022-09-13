
<?php


Route::get('/', 'ExecController@index');

Route::get('/cd', 'ExecController@cd');
Route::post('/cdpython', 'ExecController@cdpython');