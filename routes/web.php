<?php

use Illuminate\Support\Facades\Route;


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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // User routes, only accessible by admin
    Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => ['role:admin']], function () {
        Route::get('/', 'UsersController@index')->name('index');
        Route::get('/create', 'UsersController@create')->name('create');
        Route::post('/store', 'UsersController@store')->name('store');
        Route::get('/delete/{id}', 'UsersController@destroy')->name('destroy');
    });
    // User routes, generic
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/changepassword/{id}', 'UsersController@changePassword')->name('changePassword');
        Route::post('/updatepassword/{id}', 'UsersController@updatePassword')->name('updatePassword');
    });

    // Teacher routes
    Route::group(['prefix' => 'teachers', 'as' => 'teachers.'], function () {
        Route::get('/', 'TeacherController@index')->name('index');
        Route::get('/create', 'TeacherController@create')->name('create');
        Route::post('/store', 'TeacherController@store')->name('store');
        Route::get('/show/{id}', 'TeacherController@show')->name('show');
        Route::get('/edit/{id}', 'TeacherController@edit')->name('edit');
        Route::post('/update/{id}', 'TeacherController@update')->name('update');
        Route::get('/delete/{id}', 'TeacherController@destroy')->name('destroy');
    });

    // Student routes
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        // Route::get('/{status?}', 'StudentController@index')->name('index');
        Route::get('/create', 'StudentController@create')->name('create');
        Route::post('/store', 'StudentController@store')->name('store');
        Route::get('/show/{id}', 'StudentController@show')->name('show');
        Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
        Route::get('/{status?}', 'StudentController@index')->name('index');
        Route::post('/addbatch/{id}', 'StudentController@addBatch')->name('addBatch');
        Route::post('/update/{id}', 'StudentController@update')->name('update');
        Route::get('/delete/{id}', 'StudentController@destroy')->name('destroy');
        Route::get('/removebatch/{id}/{batch_id}', 'StudentController@removeBatch')->name('removeBatch');
        Route::get('/toggle/{id}', 'StudentController@toggle')->name('toggle');
        Route::get('/printdetails/{id}', 'StudentController@printDetails')->name('printDetails');
        Route::get('/printroutine/{id}', 'StudentController@printRoutine')->name('printRoutine');
        Route::get('/printcard/{id}', 'StudentController@printCard')->name('printCard');
    });

    // Potential routes
    Route::group(['prefix' => 'potentials', 'as' => 'potentials.'], function () {
        Route::get('/', 'PotentialController@index')->name('index');
        Route::get('/create', 'PotentialController@create')->name('create');
        Route::post('/store', 'PotentialController@store')->name('store');
        Route::get('/show/{id}', 'PotentialController@show')->name('show');
        Route::get('/edit/{id}', 'PotentialController@edit')->name('edit');
        Route::get('/convert/{id}', 'PotentialController@convert')->name('convert');
        Route::post('/update/{id}', 'PotentialController@update')->name('update');
        Route::get('/delete/{id}', 'PotentialController@destroy')->name('destroy');
    });

    // Batch routes
    Route::group(['prefix' => 'batches', 'as' => 'batches.'], function () {
        Route::get('/', 'BatchController@index')->name('index');
        Route::get('/create', 'BatchController@create')->name('create');
        Route::post('/store', 'BatchController@store')->name('store');
        Route::get('/show/{id}', 'BatchController@show')->name('show');
        Route::get('/edit/{id}', 'BatchController@edit')->name('edit');
        Route::post('/update/{id}', 'BatchController@update')->name('update');
        Route::get('/delete/{id}', 'BatchController@destroy')->name('destroy');
        Route::get('/printstudentlist/{id}', 'BatchController@printStudentList')->name('printStudentList');
    });

    // Subject routes
    Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
        Route::get('/', 'SubjectController@index')->name('index');
        Route::get('/create', 'SubjectController@create')->name('create');
        Route::post('/store', 'SubjectController@store')->name('store');
        Route::get('/edit/{id}', 'SubjectController@edit')->name('edit');
        Route::post('/update/{id}', 'SubjectController@update')->name('update');
        Route::get('/delete/{id}', 'SubjectController@destroy')->name('destroy');
    });

    // Cash In Routes
    Route::group(['prefix' => 'cashins', 'as' => 'cashins.'], function () {
        Route::get('/', 'CashInController@index')->name('index');
        Route::get('/create/{student_id}', 'CashInController@create')->name('create');
        Route::post('/store', 'CashInController@store')->name('store');
        Route::get('/show/{id}', 'CashInController@show')->name('show');
        Route::get('/edit/{id}', 'CashInController@edit')->name('edit');
        Route::post('/update/{id}', 'CashInController@update')->name('update');
        Route::get('/delete/{id}', 'CashInController@destroy')->name('destroy');
        Route::get('/printreceipt/{id}', 'CashInController@printReceipt')->name('printReceipt');
    });

    // Cash Out Routes
    Route::group(['prefix' => 'cashouts', 'as' => 'cashouts.'], function () {
        Route::get('/', 'CashOutController@index')->name('index');
        // David : cash_out route minor changes
        Route::get('/create', 'CashOutController@create')->name('create');
        Route::post('/store', 'CashOutController@store')->name('store');
        Route::get('/show/{id}', 'CashOutController@show')->name('show');
        Route::get('/edit/{id}', 'CashOutController@edit')->name('edit');
        Route::post('/update/{id}', 'CashOutController@update')->name('update');
        Route::get('/delete/{id}', 'CashOutController@destroy')->name('destroy');
        Route::get('/printreceipt/{id}', 'CashOutController@printReceipt')->name('printReceipt');
    });
});
