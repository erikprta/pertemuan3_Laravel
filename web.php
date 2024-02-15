<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\PegawaiController;

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

//Ingat Route itu sebagai URL


Route::get('/', function () {
    return view('welcome');
});

// Route Salam
Route::get('/salam', function () {
    return "Assalamu'alaikum Sobat, Selamat Belajar Laravel";
});

//Routing dengan Parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$devisi){
    return 'Nama Pegawai : '.$nama. '<br/>Departemen : '.$devisi;
});

//Menambahkan Route /Kabar
Route::get('/kabar',function () {
    return view('kondisi');
});

// Menambahkan atau membuat routing dengan menggunakan controllers
// lalu responnya di rect ke suatu halaman/view
// Tambahkan route baru di routes/web.php (cara 1)
//Route Data Mahasiswa
// Route::get('/mahasiswa','App\Http\Controllers\MahasiswaController@dataMahasiswa');

// (cara 2)
// use App\Http\Controller\MahasiswaController;
Route::get('/mahasiswa',[MahasiswaController::class, 'dataMahasiswa']);

//Pertemuan 4 (Menambahkan View Hello)
Route::get('/hello', function () {
    return view('p4/hello', ['name' => 'Astrophile']);
});

// Menambahkan Route Nilai
Route::get('/nilai', function () {
    return view('p4/nilai');
});

// Menambhkan Route Daftar_Nilai
Route::get('/daftarnilai', function () {
    return view('p4/daftar_nilai');
});

//Tambahkan Route Blade Template
Route::get('/phpframework', function () {
    return view('p4/layouts/index');
});
Auth::routes();

// Routing awal penggunaan AdminLTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routing Awal Penggunaan AdminLTE
// Route::get('/home', [HomeController::class, 'index']);
// Penerapan Komponen Bootstrap(1)
Route::get(
    '/aboutus',[App\Http\Controllers\HomeController::class, 'aboutus'])->name('aboutus');

//Route untuk menampilkan data pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);