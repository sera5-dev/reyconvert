<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;

Route::get('/admin',            [HomeController::class, 'admin'])->name('admin');
Route::get('/admin/dashboard',  [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/provider',   [HomeController::class, 'provider'])->name('provider');
Route::get('/admin/rate',       [HomeController::class, 'rate'])->name('rate');
Route::get('/admin/testi',      [HomeController::class, 'testi'])->name('testi');
Route::get('/admin/user',       [HomeController::class, 'user'])->name('user');
Route::get('/',                 [HomeController::class, 'index'])->name('home');
Route::get('/testimoni',        [HomeController::class, 'testimoni'])->name('home');

Route::get('/tutorial', function () {
  return view('tutorial');
});

Route::get('/tentang', function () {
  return view('tentang');
});

Route::get('/blog', function () {
  return view('blog');
});

Route::get('/logout',  [HomeController::class, 'logout'])->name('logout');
Route::post('/login', [HomeController::class, 'login'])->name('login');

Route::post('/user', function (Request $request) {
  try {
    Http::withToken(session('token'))->post(env('API_URL') . '/register', [
      'nama'                     => $request->input('nama'),
      'email'                   => $request->input('email'),
      'username'                 => $request->input('username'),
      'password'                 => $request->input('password'),
      'password_confirmation'   => $request->input('password_confirmation'),
    ]);

    return redirect()->route('user');
  } catch (\Exception $e) {
    return response()->json([
      'message' => 'create user failed',
      'error' => $e,
    ]);
  }
})->name('user-create');

Route::delete('/user', function (Request $request) {
  try {
    Http::withToken(session('token'))->delete(env('API_URL') . '/unregister', [
      'id' => $request->input('id'),
    ]);

    return redirect()->route('user');
  } catch (\Exception $e) {
    return response()->json([
      'message' => 'delete user failed',
      'error' => $e,
    ]);
  }
})->name('user-delete');

Route::post('/provider', function (Request $request) {
  try {
    Http::withToken(session('token'))->post(env('API_URL') . '/provider', [
      'nama' => $request->input('nama'),
    ]);

    return redirect()->route('provider');
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

    return redirect()->route('provider');
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

    return redirect()->route('rate');
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

    return redirect()->route('rate');
  } catch (\Exception $e) {
    return response()->json([
      'message' => 'delete rate failed',
      'error' => $e,
    ]);
  }
})->name('rate-delete');

Route::post('/testimoni', function (Request $request) {
  try {
    Http::withToken(session('token'))->post(env('API_URL') . '/testimoni', [
      'nama'       => $request->input('nama'),
      'kontak'     => $request->input('kontak'),
      'komentar'   => $request->input('komentar'),
      'video'      => $request->input('video'),
      'star'       => $request->input('star'),
      'tanggal'    => $request->input('tanggal'),
    ]);

    return redirect()->route('testi');
  } catch (\Exception $e) {
    return response()->json([
      'message' => 'create testimoni failed',
      'error' => $e,
    ]);
  }
})->name('testi-create');

Route::delete('/testimoni', function (Request $request) {
  try {
    Http::withToken(session('token'))->delete(env('API_URL') . '/testimoni', [
      'id' => $request->input('id'),
    ]);

    return redirect()->route('testi');
  } catch (\Exception $e) {
    return response()->json([
      'message' => 'delete testimoni failed',
      'error' => $e,
    ]);
  }
})->name('testi-delete');
