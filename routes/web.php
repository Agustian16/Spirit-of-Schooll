<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController as SC;
use App\Http\Controllers\KelasController as KC;
use App\Http\Controllers\SppController as SSC;
use App\Http\Controllers\PetugasController as PC;
use App\Http\Controllers\PembayaranController as Payment;
use App\Http\Controllers\LoginController as LC;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
    //     return view('welcome');
    // });
    
    // ! Route Login
    Route::get('/',[LC::class,'index'])->name('login.index');
    Route::post('/postlogin',[LC::class,'postlogin'])->name('postlogin');
    Route::get('/logout',[LC::class,'logout'])->name('logout');
    
    Auth::routes();
    
    // ! End of Route Login
    
    
    Route::group(['middleware' => ['auth']], function(){

        // Route::get('/',[LC::class,'index'])->name('login.index');
        // Route::post('/postlogin',[LC::class,'postlogin'])->name('postlogin');
        // Route::get('/logout',[LC::class,'logout'])->name('logout');
        
        Route::get('/navbar',function() {
            return view('navbar');
        });
        
        // *Siswa
        Route::middleware('ceklevel:admin')->prefix('siswa')->group(function(){
        Route::get('/',[SC::class,'index'])->name('siswa.index');
        Route::Post('/store',[SC::class,'store'])->name('siswa.store');
        Route::get('/create',[SC::class,'create'])->name('siswa.create');
        Route::get('/{nisn}/show',[SC::class,'show'])->name('siswa.show');
        Route::get('/{nisn}/edit',[SC::class,'edit'])->name('siswa.edit');
        Route::put('/{nisn}/update',[SC::class,'update'])->name('siswa.update');
        Route::delete('/{nisn}/destroy',[SC::class,'destroy'])->name('siswa.destroy');
    });
    
    // ~ Kelas
    Route::middleware('ceklevel:admin')->prefix('kelas')->group(function(){
        Route::get('/',[KC::class,'index'])->name('kelas.index');
    Route::Post('/store',[KC::class,'store'])->name('kelas.store');
    Route::get('/create',[KC::class,'create'])->name('kelas.create');
    Route::get('/{id}/show',[KC::class,'show'])->name('kelas.show');
    Route::get('/{id}/edit',[KC::class,'edit'])->name('kelas.edit');
    Route::put('/{id}/update',[KC::class,'update'])->name('kelas.update');
    Route::delete('/{id}/destroy',[KC::class,'destroy'])->name('kelas.destroy');
});

//  SPP
Route::middleware('ceklevel:admin')->prefix('spp')->group(function(){
    Route::get('/',[SSC::class,'index'])->name('spp.index');
    Route::Post('/store',[SSC::class,'store'])->name('spp.store');
    Route::get('/create',[SSC::class,'create'])->name('spp.create');
    Route::get('/{id}/show',[SSC::class,'show'])->name('spp.show');
    Route::get('/{id}/edit',[SSC::class,'edit'])->name('spp.edit');
    Route::put('/{id}/update',[SSC::class,'update'])->name('spp.update');
    Route::delete('/{id}/destroy',[SSC::class,'destroy'])->name('spp.destroy');
});

// ~ Petugas
Route::middleware('ceklevel:admin')->prefix('petugas')->group(function(){
    Route::get('/',[PC::class,'index'])->name('petugas.index');
    Route::Post('/store',[PC::class,'store'])->name('petugas.store');
    Route::get('/create',[PC::class,'create'])->name('petugas.create');
    Route::get('/{id}/show',[PC::class,'show'])->name('petugas.show');
    Route::get('/{id}/edit',[PC::class,'edit'])->name('petugas.edit');
    Route::put('/{id}/update',[PC::class,'update'])->name('petugas.update');
    Route::delete('/{id}/destroy',[PC::class,'destroy'])->name('petugas.destroy');
});


// ~ Payment
Route::middleware('ceklevel:petugas,admin')->prefix('pembayaran')->group(function(){
    Route::get('/',[Payment::class,'index'])->name('pembayaran.index');
    Route::Post('/store',[Payment::class,'store'])->name('pembayaran.store');
    Route::get('/create',[Payment::class,'create'])->name('pembayaran.create');
    Route::get('/{id}/show',[Payment::class,'show'])->name('pembayaran.show');
    Route::get('/{id}/edit',[Payment::class,'edit'])->name('pembayaran.edit');
    Route::put('/{id}/update',[Payment::class,'update'])->name('pembayaran.update');
    Route::delete('/{id}/destroy',[Payment::class,'destroy'])->name('pembayaran.destroy');
    Route::get('/export_excel',[Payment::class,'export_excel'])->name('export_excel');
    Route::get('/get-data/{nisn}',[Payment::class,'getData']);
});


Route::middleware('ceklevel:petugas,admin,siswa')->prefix('history')->group(function(){
    Route::get('history',[Payment::class,'history'])->name('history.index');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
