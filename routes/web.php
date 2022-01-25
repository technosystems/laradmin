<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::redirect('/dashboard', '/admin/dashboard');

Auth::routes(['register' => false]);

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth'],
], function () {
      Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');
      Route::resource('/usuario', 'UserController');
      Route::resource('roles',   'RolesController');
      Route::resource('permission', 'PermissionController');
});
