<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\RegisteredUserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//upload image
//these route is excluded from csrf protection
Route::post('/admin/add_user_image', [UserController::class, 'uploadUserImage'])->name('uploadUserImage');

Route::post('/admin/add_room_image', [ImageController::class, 'uploadRoomImage'])->name('uploadRoomImage');



//admin routes
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'admin'],function () {

    /***** staff  *****/
    
    //add a staff
    Route::post('/add_staff', [UserController::class, 'store'])->name('addStaff');
    
    //show list of all staffs
    Route::get('/staff_list', [UserController::class, 'index'])->name('staffList');

    //show a staff for editing
    Route::get('/staff/edit/{id}', [UserController::class, 'edit'])->name('editStaff');
    
    //delete a staff
    Route::delete('/staff/delete/{id}', [UserController::class, 'destroy'])->name('deleteStaff');
    
    //update a staff
    Route::put('/staff/update/{id}', [UserController::class, 'update'])->name('updateStaff');


    
    
    /***** room  *****/

    //add a staff
    Route::post('/add_room', [RoomController::class, 'store'])->name('addRoom');

    //show list of all rooms
    Route::get('/room_list', [RoomController::class, 'index'])->name('roomList');

    //show a room for editing
    Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('editRoom');

    
});

require __DIR__.'/auth.php';