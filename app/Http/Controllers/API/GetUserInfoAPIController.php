<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;


class GetUserInfoAPIController extends Controller
{
    private $account_number;
    private $tele_banking_pin;

    public function __construct(Request $request)
    {
        $this->account_number = $request->input('account_number');
        $this->tele_banking_pin = $request->input('pin');
        
        
    }

    public function test()
    {
        
        $user_status_id = resolve_user_account('20221001')[0]->status;
        dd($user_status_id);
        
    }

    public function get_user_balance()
    {
        $user = resolve_user_account($this->account_number);
        if($user == 0)
        {
            $data = ["status"=>"Unauthorized","message"=>"Account Number Incorrect"];
            return response()->json($data,401);

        }
        $user_pin = $user[0]->tele_banking_pin;
        // dd($this->tele_banking_pin);
        if($user_pin != $this->tele_banking_pin )
        {
            $data = ["status"=>"Unauthorized","message"=>"Incorrect Tele Banking Pin"];
            return response()->json($data,401);
        }
       
        $base_currency = base_currency_id();
        $balance = get_account_balance($base_currency,resolve_user_account($this->account_number)[0]->id); 
        $data = ["status"=>"complete","message"=>$balance,"name"=>$user[0]->name];
        return response()->json($data);
    }

    public function get_user_status()
    {
        $user = resolve_user_account($this->account_number);
        if($user == 0)
        {
            $data = ["status"=>"Unauthorized","message"=>"Account Number Incorrect"];
            return response()->json($data,401);

        }
        
        $user_pin = $user[0]->tele_banking_pin;
        
        if($user_pin != $this->tele_banking_pin )
        {
            $data = ["status"=>"Unauthorized","message"=>"Incorrect Tele Banking Pin"];
            return response()->json($data,401);
        }
       
        
        $status = '';
        $user_status_id = resolve_user_account($this->account_number)[0]->status;
        if($user_status_id == 1)
        {
            $status = "active";
            $data = ["status"=>"complete","message"=>$status,"name"=>$user[0]->name];

            return response()->json($data) ;
        }else{
            $status = "inactive";
            $data = ["status"=>"complete","message"=>$status,"name"=>$user[0]->name];
            
            return response()->json($data) ;

        }
    }

    public function auth_user()
    {
        $user_pin = resolve_user_account($this->account_number)[0]->tele_banking_pin;
        // dd($this->tele_banking_pin);
        if($user_pin != $this->tele_banking_pin )
        {
            $data = ["status"=>"Unauthorized","message"=>"Incorrect Tele Banking Pin"];
            return response()->json($data,401);
        }
       

    }
    
}