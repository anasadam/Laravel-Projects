<?php

namespace App\Http\Controllers;


class PostController extends Controller
{

        public function __construct()
        {
            parent::__construct();
        }
    
    //Function to list all posts
    public function index()
    {
        try {
            $apiRequest = $this->client->request('GET', $this->baseApiUrl.'/posts', [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'verify' => false
            ]);
            return response()->json(json_decode($apiRequest->getBody()->getContents()), 200);

        } catch (RequestException $error) {
                return response()->json("Something went wrong.");
        }
    }
    
    public function getUserPosts($userId = 0)
    {
        if($userId > 0 ){
             try {
            $apiRequest = $this->client->request('GET', $this->baseApiUrl.'/posts?userId='.$userId);
            
             return response()->json(json_decode($apiRequest->getBody()->getContents()), 200);

        } catch (RequestException $error) {
                return response()->json("Something went wrong.");
        }
        }
        
    }
   
}
