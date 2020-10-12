<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;

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

Route::get('/', 			[HomeController::class, 'index'])->name('home');
Route::get('/admin',	[HomeController::class, 'admin'])->name('admin');
Route::get('/logout',	[HomeController::class, 'logout']);
Route::post('/login', [HomeController::class, 'login'])->name('login');

Route::post('/provider', function (Request $request) {
	try {
		Http::withToken(session('token'))->post(env('API_URL') . '/provider', [
			'nama' => $request->input('nama'),
		]);

		return redirect()->route('admin');
	} catch (\Exception $e) {
		return response()->json([
			'message' => 'create provider failed',
			'error' => $e,
		]);
	}
})->name('provider-create');

Route::delete('/provider', function (Request $request) {
	try {
		Http::withToken(session('token'))->delete(env('API_URL') . '/provider', [
			'id' => $request->input('id'),
		]);

		return redirect()->route('admin');
	} catch (\Exception $e) {
		return response()->json([
			'message' => 'delete provider failed',
			'error' => $e,
		]);
	}
})->name('provider-delete');

Route::post('/rate', function (Request $request) {
	try {
		Http::withToken(session('token'))->post(env('API_URL') . '/rate', [
			'provider_id' => $request->input('provider_id'),
			'rate' => $request->input('rate'),
			'pulsa' => $request->input('pulsa'),
		]);

		return redirect()->route('admin');
	} catch (\Exception $e) {
		return response()->json([
			'message' => 'create rate failed',
			'error' => $e,
		]);
	}
})->name('rate-create');

Route::delete('/rate', function (Request $request) {
	try {
		Http::withToken(session('token'))->delete(env('API_URL') . '/rate', [
			'id' => $request->input('id'),
		]);

		return redirect()->route('admin');
	} catch (\Exception $e) {
		return response()->json([
			'message' => 'delete rate failed',
			'error' => $e,
		]);
	}
})->name('rate-delete');
