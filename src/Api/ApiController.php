<?php

namespace SwiftDesign\Api\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

//Import API Traits 
use SwiftDesign\Api\Traits\ApiTrait;

class ApiController extends Controller
{
    use ApiTrait;

    public function GetAccessTokenOauth(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        
        $response = $http->post(getenv('SWIFT_API_LOCATION').'/oauth/token', [
            'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => getenv('SWIFT_API_CLIENT_ID'),
            'client_secret' => getenv('SWIFT_API_KEY_SECRET'),
            'scope' => 'view-blog',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

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
    
}
