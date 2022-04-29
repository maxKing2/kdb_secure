<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class AuthApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        // return dd($request->input("country"));
        // die;
        $apitoken =env("API_GEN_TOKEN");
        $incoming_token = $request->header("Api-Access-Token");


        if($request->isMethod("GET") 
        || $request->isMethod("POST")
        || $request->isMethod("DELETE") )
        {
            if($incoming_token !== $apitoken){
                return response("Action Unauthorized",401);
            } 
            
       
          
        }
      


        
       
        return $next($request)
        ->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, DELETE,OPTIONS')
    
        ->header('Access-Control-Allow-Headers', 'Api-Access-Token,Content-Type,X-Auth-Token, Authorization, Origin, Country');
        
        
        
    }

  
}
