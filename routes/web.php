<?php

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', function(){ 
//  $home= view('admin.pages.home');
//  return view('admin.master', compact('home'));
  return view('admin.pages.home');
});

Route::get('/new-admission', 'StudentController@new_admission');
Route::post('/save-student', 'StudentController@save_student');
Route::get('/student-list', 'StudentController@student_list');


Route::get('/class-management', 'AcademicManagementController@class_management');
Route::post('/add-class', 'AcademicManagementController@add_class');
Route::get('/ajax-edit-view-{id}', 'AcademicManagementController@ajax_edit_view');
Route::post('/update-class', 'AcademicManagementController@update_class');
Route::get('/delete-class-{id}', 'AcademicManagementController@delete_class');

Route::get('/test', 'AcademicManagementController@test');

Route::get('/account-settings', 'AcademicManagementController@account_settings');

Route::post('/save-new-head', 'AcademicManagementController@save_new_head');
Route::get('/ajax-view-head-item', 'AcademicManagementController@ajax_view_head_item');
Route::get('/ajax-edit-head-item', 'AcademicManagementController@ajax_edit_head_item');
Route::post('/ajax-update-head-item', 'AcademicManagementController@ajax_update_head_item');
Route::get('/ajax-delete-head-item-view', 'AcademicManagementController@ajax_delete_head_item');
Route::post('/delete-head-item', 'AcademicManagementController@delete_head_item');

Route::get('/add-fees', 'AcademicManagementController@add_fees');
Route::post('/save-fees', 'AcademicManagementController@save_fees');
Route::get('/invoice-generate', 'AcademicManagementController@invoice_generate');
Route::post('/generate-invoice', 'AcademicManagementController@generate_invoice');

Route::get('/hello-world', function(){
  echo 'Hello World';  
});
