<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
	function getProvider()
	{
		return json_decode(Http::get(env('API_URL') . '/provider')->body())->data;
	}

	function getRate()
	{
		return json_decode(Http::get(env('API_URL') . '/rate')->body())->data;
	}

	function getUser()
	{
		return json_decode(Http::withToken(session('token'))->get(env('API_URL') . '/user')->body())->data;
	}

	function getTestimoni()
	{
		return json_decode(Http::get(env('API_URL') . '/testimoni')->body())->data;
	}

	public function index()
	{
		$providers 	= $this->getProvider();
		$rates 			= $this->getRate();
		$testimonis = $this->getTestimoni();
		return view('index', [
			'providers' 	=> $providers,
			'rates' 			=> $rates,
			'testimonis' 	=> $testimonis,
		]);
	}

	public function admin()
	{
		return session('token') ?
			view('admin', [
				'providers' 	=> $this->getProvider(),
				'rates' 			=> $this->getRate(),
				'users' 			=> $this->getUser(),
				'testimonis' 	=> $this->getTestimoni(),
			]) : view('login');
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'username' => 'required',
			'password' => 'required',
		]);

		try {
			$data = json_decode(Http::post(env('API_URL') . '/login', [
				'username' => $request->input('username'),
				'password' => $request->input('password'),
			])->body());

			if (property_exists($data, 'token')) {
				session()->put('token', $data->token);
				return redirect()->route('admin');
			} else {
				session()->flush();
				echo "login failed";
			}
		} catch (\Exception $e) {
			return response()->json([
				'message' => "login failed",
				'error' => $e
			], 409);
		}
	}

	public function logout()
	{
		session()->flush();
		return redirect()->route('home');
	}
}
