<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
	public function index()
	{
		$providers = json_decode(Http::get('https://sera5.id/reyconvert/api/provider')->body())->data;
		$rates = json_decode(Http::get('https://sera5.id/reyconvert/api/rate')->body())->data;
		return view('index', ['providers' => $providers, 'rates' => $rates]);
	}
}
