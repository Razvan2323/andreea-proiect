<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Models\Image;
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
    $getData = Image::all();
    session()->flash('data_img', $getData);
    return view('exam');
});


Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');