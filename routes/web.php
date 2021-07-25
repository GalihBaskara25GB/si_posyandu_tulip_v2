<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RangkingController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ObjekKriteriaController;
use App\Http\Controllers\PairwiseController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('ahp', [PerhitunganController::class, 'ahp'])->name('ahp');
Route::get('topsis', [PerhitunganController::class, 'topsis'])->name('topsis');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'aboutUs'])->name('about');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');

    //Users Page
    Route::group(['middleware' => ['checkIfAdmin:user']], function () {
        Route::get('/rangking', [HomeController::class, 'rangkingUser'])->name('rangking');
    });

    //Admins Page
    Route::group(['middleware' => ['checkIfAdmin:administrator']], function () {
        //Kaders Route
        Route::get('/kaders/print_pdf', [KaderController::class, 'generatePdf'])->name('kaders.print_pdf');
        Route::resource('kaders', KaderController::class);
        Route::post('kaders/import', [KaderController::class, 'import'])->name('kaders.import');
        
        //Users Route
        Route::get('/users/print_pdf', [UserController::class, 'generatePdf'])->name('users.print_pdf');
        Route::resource('users', UserController::class);

        //Kriterias Route
        Route::get('/kriterias/print_pdf', [KriteriaController::class, 'generatePdf'])->name('kriterias.print_pdf');
        Route::get('/kriterias/pairwise', [KriteriaController::class, 'pairwise'])->name('kriterias.pairwise');
        Route::resource('kriterias', KriteriaController::class);
        
        //Rangkings Route
        Route::get('rangkings/proses', [RangkingController::class, 'index'])->name('rangkings.proses');
        Route::get('rangkings/print_pdf', [RangkingController::class, 'generatePdf'])->name('rangkings.print_pdf');
        Route::get('rangkings/topsis', [RangkingController::class, 'index'])->name('rangkings.topsis');
        Route::resource('rangkings', RangkingController::class);

        //Objek Kriterias Route
        Route::get('/objekKriterias/print_pdf', [ObjekKriteriaController::class, 'generatePdf'])->name('objekKriterias.print_pdf');
        Route::resource('objekKriterias', ObjekKriteriaController::class);

        //Pairwises Route
        Route::get('/pairwises/print_pdf', [PairwiseController::class, 'generatePdf'])->name('pairwises.print_pdf');
        Route::resource('pairwises', PairwiseController::class);

    });
 
});
