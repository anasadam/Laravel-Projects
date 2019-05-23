<?php

namespace App\Http\Controllers;


class CommentController extends Controller
{

        public function __construct()
        {
            parent::__construct();
        }
    
    //Function to list all comments
    public function index()
    {
        try {
            $apiRequest = $this->client->request('GET', $this->baseApiUrl.'/comments', [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]);
            return response()->json(json_decode($apiRequest->getBody()->getContents()), 200);

        } catch (RequestException $error) {
                return response()->json("Something went wrong.");
        }
    }
    
    //Get Specific post's comments
    public function getPostComments($postId = 0)
    {
        if($postId > 0 ){
             try {
            $apiRequest = $this->client->request('GET', $this->baseApiUrl.'/comments?postId='.$postId);
            
             return response()->json(json_decode($apiRequest->getBody()->getContents()), 200);

        } catch (RequestException $error) {
                return response()->json("Something went wrong.");
        }
        }
        
    }
   
}
