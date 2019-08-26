<?php

namespace SwiftDesign\Api\Traits;

use App\Http\Requests;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait ApiTrait
{
	private function CallSwiftAPI($route, $data = null)
	{
    	$http = new \GuzzleHttp\Client;

        $swift_route = getenv('SWIFT_API_LOCATION').'/api/';

    	$api_route = $swift_route . $route; 
           
        $response = $http->post($api_route, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. getenv('SWIFT_API_ACCESS_TOKEN'),
            ],
            'form_params' => [
                'key'  => getenv('SWIFT_PUBLIC_KEY'),
                'data' => $data,
            ],
        ]);

       	return json_decode((string) $response->getBody(), true);
    }

    // protected function getS3route()
    // {
    //     return getenv('S3_ROUTE') . getenv('S3_BUCKET') . '/' . getenv('SWIFT_PUBLIC_KEY') .'/Blog';
    // }

    protected function getClientPublicKey()
    {
        return getenv('SWIFT_PUBLIC_KEY');
    }

    
}