<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/api/callback/submit/test', 'SwiftDesign\Api\Api\ApiController@testAPI');


/* 
	SETUP OAUTH ACCESS TOKEN 

		- NOTE: THIS ROUTE NEEDS TO BE COMMENTED OUT 
		AFTER SETUP OR YOUR APPLICATION WILL HAVE A 
		SECURITY VULNERABILITY 
*/

if(getenv('SWIFT_API_URL_REQUEST') === 'true')
{
	Route::get('/api/callback/oauth/setup', 'SwiftDesign\Api\Api\ApiController@GetAccessTokenOauth');
}


