<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
//this route is excluded from csrf protection
Route::post('/upload_user_image', [UserController::class, 'uploadUserImage'])->name('uploadUserImage');

Route::post('/admin_add_user_image', [RegisteredUserController::class, 'uploadUserImage']);

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'admin'],function () {

    Route::post('/add_staff', [UserController::class, 'store'])->name('addStaff');

    Route::get('/staff_list', [UserController::class, 'index'])->name('staffList');

    Route::get('/staff/edit/{id}', [UserController::class, 'edit'])->name('editStaff');

    Route::put('/staff/update/{id}', [UserController::class, 'update'])->name('updateStaff');

    
});

require __DIR__.'/auth.php';