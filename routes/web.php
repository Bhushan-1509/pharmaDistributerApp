<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
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

Route::get('/about-us',function(){
    return view('about-us');
});

Route::get('/services',function(){
    return view('services');
});

Route::get('/contact-us',function(){
    return view('contact-us',[
        'class' => 'none col-sm-12 ',
        'text' => ''
    ]);
});

Route::post('/contact-us',[\App\Http\Controllers\ContactUsController::class,'handle']);

Route::post('/send-mail',[\App\Http\Controllers\PHPMailerController::class,'sendMail']);
