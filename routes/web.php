<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'login','AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('logout','AdminController@logout');
        //Users
        Route::get('users','AdminController@users');
        Route::match(['get','post'],'add-edit-user/{id?}','AdminController@addEditUsers');
        Route::get('delete-users/{id?}','AdminController@deleteUser'); 

        //Roles
        Route::get('roles','UserRolesController@roles');  
        Route::match(['get','post'],'add-edit-role/{id?}','UserRolesController@addEditRoles');
        Route::get('delete-roles/{id?}','UserRolesController@deleteRole'); 

    });
});
