<?php
use App\client_type;
use Illuminate\Support\Facades\View;
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

Route::get('/', function () {
    return view('welcome');
});
Route::POST('admin/attendance', 'AttendanceController@create')->name('admin.attendance');
Route::POST('admin/from_to','AttendanceController@from_to')->name('admin.from_to');
Route::get('admin/attendance_details/{client_id}/{from}/{to}/{sport2}','AttendanceController@attendance_details');

view::composer(['*'],function($view){
    $companies=client_type::where('company',1)->get();
    $others=client_type::where('company',0)->get();
	$view->with('companies',$companies);
	$view->with('others',$others);
});

 Route::get('institution','InstitutionRegisterController@index')->name('admin.institution');
Route::post('admin/institution_register', 'InstitutionRegisterController@store')->name('admin.institution_register');
Route::get('admin/payments', 'PaymentController@index')->name('admin.payments');
Route::get('admin/entities', 'InstitutionRegisterController@show')->name('admin.entities');


