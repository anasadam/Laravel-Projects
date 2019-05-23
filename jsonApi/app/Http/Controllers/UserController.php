<?php

namespace App\Http\Controllers;


class UserController extends Controller
{

        public function __construct()
        {
            parent::__construct();
        }
    
    //Function to list all users
    public function index()
    {
        try {
            $apiRequest = $this->client->request('GET', $this->baseApiUrl.'/users', [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]);
           
            return response()->json(json_decode($apiRequest->getBody()->getContents()), 200);

        } catch (RequestException $error) {
                return response()->json("Something went wrong.");
        }
    }
    
    //Retrieve specific user data
    public function getUser($userId){
        try {
            $apiRequest = $this->client->request('GET', $this->baseApiUrl.'/users/'.$userId);
            
             return response()->json(json_decode($apiRequest->getBody()->getContents()), 200);

        } catch (RequestException $error) {
                return response()->json("Something went wrong.");
        }
        
    }
    
    
    
    

   
}
