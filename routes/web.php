<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
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

Route::get('/dashboard',\App\Http\Controllers\DashboardController::class)->middleware(['auth'])->name('dashboard');
//instructor route

Route::get('/instructor/dashboard', function ()
{
    return view('instructor.dashboard');
})->middleware(['auth','role:instructor'])->name('instructor.dashboard');

//member route
Route::get('/member/dashboard', function ()
{
    return view('member.dashboard');
})->middleware(['auth','role:member'])->name('member.dashboard');


Route::middleware(['auth','role:member'])->group(function ()
{
    Route::get('member/dashboard',function ()
    {
        return view('member.dashboard');
    })->name('member.dashboard');
    Route::get('member/book',[\App\Http\Controllers\BookingController::class,'create'])->name('booking.create');
    Route::post('member/bookings',[\App\Http\Controllers\BookingController::class,'store'])->name('booking.store');
    Route::get('member/bookings',[\App\Http\Controllers\BookingController::class,'index'])->name('booking.index');
    Route::delete('member/bookings/{id}',[\App\Http\Controllers\BookingController::class,'destroy'])->name('booking.destroy');
});




//admin route
Route::get('/admin/dashboard', function ()
{
    return view('admin.dashboard');
})->middleware(['auth','role:admin'])->name('admin.dashboard');
//Schedule route

Route::resource('/instructor/schedule',ScheduleController::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
