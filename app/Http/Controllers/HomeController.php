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

	public function index()
	{
		$providers = $this->getProvider();
		$rates = $this->getRate();
		return view('index', ['providers' => $providers, 'rates' => $rates]);
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'username' => 'required',
			'password' => 'required',
		]);
		$data = json_decode(Http::post(env('API_URL') . '/login', [
			'username' => $request->input('username'),
			'password' => $request->input('password'),
		])->body());

		if (property_exists($data, 'token')) {
			session()->put('token', $data->token);
			$providers = $this->getProvider();
			$rates = $this->getRate();
			return view('admin', ['providers' => $providers, 'rates' => $rates]);
		} else {
			session()->flush();
			echo "login failed";
		}

		try {
		} catch (\Exception $e) {
			return response()->json([
				'message' => "login failed",
				'error' => $e
			], 409);
		}
	}

	public function logout()
	{
	}
}
