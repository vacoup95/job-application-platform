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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    Route::resources([
        'application' => 'ApplicationController',
        'note' => 'NoteController',
        'resume' => 'ResumeController',
        'progress' => 'ProgressController',
        'profile' => 'ProfileController'
    ]);
});

Route::group(['middleware' => 'admin'], function() {
    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', 'Admin\DashboardController', ['as' => 'admin']);
        Route::resource('status', 'Admin\StatusController', ['as' => 'admin']);
        Route::resource('communication', 'Admin\CommunicationMethodsController', ['as' => 'admin']);
        Route::resource('progress', 'Admin\ProgressController', ['as' => 'admin']);
        Route::resource('users', 'Admin\UserController', ['as' => 'admin']);
        Route::resource('action', 'Admin\ActionController', ['as' => 'admin']);
        Route::post('save-option', 'Admin\OptionController@saveOrUpdate', ['as' => 'admin'])->name('option.save');
    });
});


Route::get('/resumes/{file}', [ function ($file) {
    $path = storage_path('app/resumes/'.$file);
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
}]);
