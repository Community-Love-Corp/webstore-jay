<?php
//Simple API endpoint for Playwright testing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
	return response()->json([
		'id'=> 2,
		'name'=> "Modern User",
		'email'=> "modern@example.com"	
	]);
});

Route::get('/ping', function () {
   return 'pong'; 
});
