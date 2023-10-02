<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/about-us',function(){
    return view('about-us');
});

Route::get('/services',function(){
    return view('services');
});

Route::get('/medicines',function(){
    return view('medicines');
});

Route::get('/medicines/{id}',[\App\Http\Controllers\MedicineController::class,'showInfo']);

Route::get('/contact-us',function(){
    return view('contact-us',['class' => 'none','text' => '']);
});

Route::post('/contact-us',[\App\Http\Controllers\ContactUsController::class,'handle']);

Route::get('/admin',function(){
   return view('admin.index');
})->name('admin');

Route::get('/admin/medicines',function (){
    return view('admin.medicines');
});

Route::get('/admin/medicines/edit/{id}',[\App\Http\Controllers\MedicineController::class,'adminEdit']);

Route::post('/admin/medicines/edit/{id}',[\App\Http\Controllers\MedicineController::class,'updateMedicine']);

Route::get('/admin/medicines/delete/{id}',[\App\Http\Controllers\MedicineController::class,'deleteMedicine']);


Route::get('/admin/add-medicine',function (){
    return view('admin.addmedicine',['class'=> 'none','text'=>'']);
});


Route::post('/admin/add-medicine',[\App\Http\Controllers\MedicineController::class,'handle']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

