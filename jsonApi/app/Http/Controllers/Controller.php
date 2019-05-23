<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use GuzzleHttp\Client as GuzzleHttpClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    protected $client; 
    protected $baseApiUrl;

     public function __construct()
        {
            $this->client = new GuzzleHttpClient();
            $this->baseApiUrl = env('API_URL');
        }
}
