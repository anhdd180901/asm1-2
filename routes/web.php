<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('homePage');

// Route::get('/admin/room/list', "Admin\RoomController@getList")->name('room.getList');

// Route::get('/admin/room/add', "Admin\RoomController@getAdd")->name('room.getAdd');
// Route::post('/admin/room/add', "Admin\RoomController@postAdd")->name('room.postAdd');

// Route::get('/admin/room/edit/{id}', "Admin\RoomController@getAdd")->name('room.getAdd');
// Route::post('/admin/room/edit/{id}', "Admin\RoomController@postAdd")->name('room.postAdd');

Route::prefix('admin')->group(function () {
    Route::prefix('room')->group(function () {
        Route::get('/list', "Admin\RoomController@getList")->name('room.getList');

        Route::get('/add', "Admin\RoomController@getAdd")->name('room.getAdd');
        Route::post('/add', "Admin\RoomController@postAdd")->name('room.postAdd');

        Route::get('/edit/{id}', "Admin\RoomController@getEdit")->name('room.getEdit');
        Route::post('/edit/{id}', "Admin\RoomController@postEdit")->name('room.postEdit');

        Route::get('/delete/{id}', "Admin\RoomController@getDelete")->name('room.getDelete');
    });

    //list,add,update,delete service
    Route::prefix('service')->group(function () {
        Route::get('/list', "Admin\ServiceController@getList")->name('service.getList');
        //add
        Route::get('/add', "Admin\ServiceController@getAdd")->name('service.getAdd');
        Route::post('/add', "Admin\ServiceController@postAdd")->name('service.postAdd');
        //update
        Route::get('/edit/{id}', "Admin\ServiceController@getEdit")->name('service.getEdit');
        Route::post('/edit/{id}', "Admin\ServiceController@postEdit")->name('service.postEdit');
        //delete
        Route::get('/delete/{id}', "Admin\ServiceController@getDelete")->name('service.getDelete');
    });
});
