<?php


use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\DashboardController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// All route names are prefixed with 'admin.Design'.
Route::group([

    'prefix' => 'design',
    'as' => 'design.',
    'namespace' => 'Design',

], function() {
    Route::get('/', 'DesignController@index')->name('index');
    Route::get('/create', 'DesignController@create')->name('create');
    Route::post('/store', 'DesignController@store')->name('store');
    Route::get('/edit/{id}', 'DesignController@edit')->name('edit');
    Route::post('/update/{id}', 'DesignController@update')->name('update');
    Route::get('/delete/{id}', 'DesignController@delete')->name('delete');

});
// All route names are prefixed with 'admin.Project'.
Route::group([

    'prefix' => 'project',
    'as' => 'project.',
    'namespace' => 'Project',

], function() {
    Route::get('/', 'ProjectController@index')->name('index');
    Route::get('/create', 'ProjectController@create')->name('create');
    Route::post('/store', 'ProjectController@store')->name('store');
    Route::get('/edit/{id}', 'ProjectController@edit')->name('edit');
    Route::post('/update/{id}', 'ProjectController@update')->name('update');
    Route::get('/delete/{id}', 'ProjectController@delete')->name('delete');

});

// All route names are prefixed with 'admin.category'.
Route::group([

    'prefix' => 'category',
    'as' => 'category.',
    'namespace' => 'Category',

], function() {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/create', 'CategoryController@create')->name('create');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('update');
    Route::get('/delete/{id}', 'CategoryController@delete')->name('delete');

});

// All route names are prefixed with 'admin.Quiz'.
Route::group([
    'prefix' => 'quiz',
    'as' => 'quiz.',
    'namespace' => 'Quiz',
], function() {
    Route::get('/', 'QuizController@index')->name('index');
});