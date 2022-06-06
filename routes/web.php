<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\BranchController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('hotel', [HotelController::class, 'index'])->name('admin.hotel');

    // All Branches Routes
    Route::get('branches', [BranchController::class, 'index'])->name('admin.branch');
    Route::post('add/branch', [BranchController::class, 'add'])->name('admin.add_branch');
    Route::get('delete/branch/{id}', [BranchController::class, 'delete'])->name('admin.branch_delete');
    Route::get('edit/branch/{id}', [BranchController::class, 'edit'])->name('admin.branch_edit');
    Route::get('active/branch/{id}', [BranchController::class, 'active'])->name('admin.branch_active');
    Route::get('inactive/branch/{id}', [BranchController::class, 'inactive'])->name('admin.branch_inactive');

    // All Rooms Routes
    Route::get('rooms', [RoomController::class, 'index'])->name('admin.rooms');
    Route::get('add/room', [RoomController::class, 'add'])->name('admin.add_room');
    Route::post('store/room', [RoomController::class, 'store'])->name('admin.store_room');
    Route::get('delete/room/{id}', [RoomController::class, 'delete'])->name('admin.room_delete');
    Route::get('edit/room/{id}', [RoomController::class, 'edit'])->name('admin.room_edit');
    Route::post('update/room/{id}', [RoomController::class, 'update'])->name('admin.update_room');

    // All Rooms Routes
      Route::get('book', [BookingController::class, 'index'])->name('admin.book');  
    Route::get('add/book', [BookingController::class, 'add'])->name('admin.add_book');
    Route::post('store/room', [BookingController::class, 'store'])->name('admin.store_book');
    //   Route::get('branch/room/ajax/{branch_id}', [BookingController::class, 'GetRoom']);
    // Route::get('delete/room/{id}', [RoomController::class, 'delete'])->name('admin.room_delete');
    //   Route::get('edit/room/{id}', [RoomController::class, 'edit'])->name('admin.room_edit');  
    //   Route::post('update/room/{id}', [RoomController::class, 'update'])->name('admin.update_room');  


});
