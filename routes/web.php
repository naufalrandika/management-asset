<?php

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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\BerwujudController;
use App\Http\Controllers\TBerwujudController;
use App\Http\Controllers\MasterJenisController;
use App\Http\Controllers\MasterLokasiController;
use App\Http\Controllers\MasterStatusController;
use App\Http\Controllers\MasterKeadaanController;

Route::get('/', function () {
	return redirect('sign-in');
})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');

	Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
	Route::get('/laporan/download-pdf', [LaporanController::class, 'downloadPDF'])->name('laporan.downloadPDF');

	Route::get('/berwujud', [BerwujudController::class, 'index'])->name('berwujud.index');
	Route::get('/berwujud/download-pdf', [BerwujudController::class, 'downloadPDF'])->name('berwujud.downloadPDF');
	Route::get('/berwujud/create', [BerwujudController::class, 'create'])->name('berwujud.create');
	Route::post('/berwujud', [BerwujudController::class, 'store'])->name('berwujud.store');
	Route::get('/berwujud/{berwujud}', [BerwujudController::class, 'show'])->name('berwujud.show');
	Route::get('/berwujud/{berwujud}/edit', [BerwujudController::class, 'edit'])->name('berwujud.edit');
	Route::put('/berwujud/{berwujud}', [BerwujudController::class, 'update'])->name('berwujud.update');
	Route::delete('/berwujud/{berwujud}', [BerwujudController::class, 'destroy'])->name('berwujud.destroy');
	Route::get('/berwujud/filterByJenis', [BerwujudController::class, 'filterByJenis'])->name('berwujud.filterByJenis');



	Route::get('/tberwujud', [TBerwujudController::class, 'index'])->name('tberwujud.index');
	Route::get('/tberwujud/download-pdf', [TBerwujudController::class, 'downloadPDF'])->name('tberwujud.downloadPDF');
	Route::get('/tberwujud/create', [TBerwujudController::class, 'create'])->name('tberwujud.create');
	Route::post('/tberwujud', [TBerwujudController::class, 'store'])->name('tberwujud.store');
	Route::get('/tberwujud/{tberwujud}', [TBerwujudController::class, 'show'])->name('tberwujud.show');
	Route::get('/tberwujud/{tberwujud}/edit', [TBerwujudController::class, 'edit'])->name('tberwujud.edit');
	Route::put('/tberwujud/{tberwujud}', [TBerwujudController::class, 'update'])->name('tberwujud.update');
	Route::delete('/tberwujud/{tberwujud}', [TBerwujudController::class, 'destroy'])->name('tberwujud.destroy');

	Route::get('/masterjenis', [MasterJenisController::class, 'index'])->name('masterjenis.index');
	Route::get('/masterjenis/create', [MasterJenisController::class, 'create'])->name('masterjenis.create');
	Route::post('/masterjenis', [MasterJenisController::class, 'store'])->name('masterjenis.store');
	Route::get('/masterjenis/{masterjenis}', [MasterJenisController::class, 'show'])->name('masterjenis.show');
	Route::get('/masterjenis/{masterjenis}/edit', [MasterJenisController::class, 'edit'])->name('masterjenis.edit');
	Route::put('/masterjenis/{masterjenis}', [MasterJenisController::class, 'update'])->name('masterjenis.update');
	Route::delete('/masterjenis/{masterjenis}', [MasterJenisController::class, 'destroy'])->name('masterjenis.destroy');

	Route::get('/masterlokasi', [MasterLokasiController::class, 'index'])->name('masterlokasi.index');
	Route::get('/masterlokasi/create', [MasterLokasiController::class, 'create'])->name('masterlokasi.create');
	Route::post('/masterlokasi', [MasterLokasiController::class, 'store'])->name('masterlokasi.store');
	Route::get('/masterlokasi/{masterlokasi}', [MasterLokasiController::class, 'show'])->name('masterlokasi.show');
	Route::get('/masterlokasi/{masterlokasi}/edit', [MasterLokasiController::class, 'edit'])->name('masterlokasi.edit');
	Route::put('/masterlokasi/{masterlokasi}', [MasterLokasiController::class, 'update'])->name('masterlokasi.update');
	Route::delete('/masterlokasi/{masterlokasi}', [MasterLokasiController::class, 'destroy'])->name('masterlokasi.destroy');

	Route::get('/masterstatus', [MasterStatusController::class, 'index'])->name('masterstatus.index');
	Route::get('/masterstatus/create', [MasterStatusController::class, 'create'])->name('masterstatus.create');
	Route::post('/masterstatus', [MasterStatusController::class, 'store'])->name('masterstatus.store');
	Route::get('/masterstatus/{masterstatus}', [MasterStatusController::class, 'show'])->name('masterstatus.show');
	Route::get('/masterstatus/{masterstatus}/edit', [MasterStatusController::class, 'edit'])->name('masterstatus.edit');
	Route::put('/masterstatus/{masterstatus}', [MasterStatusController::class, 'update'])->name('masterstatus.update');
	Route::delete('/masterstatus/{masterstatus}', [MasterStatusController::class, 'destroy'])->name('masterstatus.destroy');

	Route::get('/masterkeadaan', [MasterKeadaanController::class, 'index'])->name('masterkeadaan.index');
	Route::get('/masterkeadaan/create', [MasterKeadaanController::class, 'create'])->name('masterkeadaan.create');
	Route::post('/masterkeadaan', [MasterKeadaanController::class, 'store'])->name('masterkeadaan.store');
	Route::get('/masterkeadaan/{masterkeadaan}', [MasterKeadaanController::class, 'show'])->name('masterkeadaan.show');
	Route::get('/masterkeadaan/{masterkeadaan}/edit', [MasterKeadaanController::class, 'edit'])->name('masterkeadaan.edit');
	Route::put('/masterkeadaan/{masterkeadaan}', [MasterKeadaanController::class, 'update'])->name('masterkeadaan.update');
	Route::delete('/masterkeadaan/{masterkeadaan}', [MasterKeadaanController::class, 'destroy'])->name('masterkeadaan.destroy');
;




	Route::get('ph', [PHController::class, 'index'])->name('ph');
	Route::get('do', [DOController::class, 'index'])->name('do');
	// Route::get('rtl', function () {
	// 	return view('pages.rtl');
	// })->name('rtl');
	// Route::get('virtual-reality', function () {
	// 	return view('pages.virtual-reality');
	// })->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});
