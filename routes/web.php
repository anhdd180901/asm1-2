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


    // Route::prefix('service')->group(function () {
    //     Route::get('/list', "Admin\RoomController@getList")->name('room.getList');

    //     Route::get('/add', "Admin\RoomController@getAdd")->name('room.getAdd');
    //     Route::post('/add', "Admin\RoomController@postAdd")->name('room.postAdd');

    //     Route::get('/edit/{id}', "Admin\RoomController@getEdit")->name('room.getEdit');
    //     Route::post('/edit/{id}', "Admin\RoomController@postEdit")->name('room.postEdit');

    // });

});

//list,add,update,delete service
Route::get('/admin/service/list', "Admin\ServiceController@getList")->name('service.getList');
//add
Route::get('/admin/service/add', "Admin\ServiceController@getAdd")->name('service.getAdd');
Route::post('/admin/service/add', "Admin\ServiceController@postAdd")->name('service.postAdd');
//update
Route::get('/admin/service/update', "Admin\ServiceController@getUpdate")->name('service.getUpdate');
Route::post('/admin/service/update', "Admin\ServiceController@postUpdate")->name('service.postUpdate');
