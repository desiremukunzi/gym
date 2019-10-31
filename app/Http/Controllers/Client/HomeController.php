<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\order;
use App\sport;
use App\member;
use App\attendance;
use App\subscription;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
USE GuzzleHttp\Client;

class HomeController extends Controller
{

    protected $redirectTo = '/client/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('client.auth:client');
    }

    /**
     * Show the Client dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
   

     $client_type_id=auth('client')->user()->client_type_id;

     if($client_type_id==1)
     {
     $sports=sport::all(); 
     return view('client.home',compact('sports'));
}
     else 
     {   

     $sports=subscription::with('sport')->where('client_type_id',$client_type_id)->get();

     $clients=member::where('client_type_id',$client_type_id)->get();
     
     $attendances=attendance::with('sport')->get();

     return view('client.home',compact('sports','clients','attendances'));

    } 

 

    }

    public function momo(Request $request) {

               
     $client_type_id=auth('client')->user()->client_type_id;

     if($client_type_id==1){
               $sports=sport::all();
               $amount=0;
               foreach ($sports as $key => $sport) {
               $sport_=$sport->name;
               
               if($request->$sport_) 
               { 
                $amount=$amount+$sport->amount;
                $client_=$request->$sport_;
               }
           }
       }
       else
        $amount=$request->amount;
        $transaction_id=0;
        $transaction_id= order::orderBy('id','desc')->limit(1)->value('id');   
        
        $booking = new order();
        $booking->client_id=auth('client')->user()->id;
        $booking->amount=$amount;
        $booking->status=0;

        $booking->save();

        echo $token = $request->token;
        echo $amount = $amount;
        echo $msisdn = auth('client')->user()->tel;
        echo $external_transaction_id = $transaction_id;
        echo $from_msg = auth('client')->user()->id;
        echo $to_msg = "payment";

        

        $uri = 'https://novapay.rw/api/v1/novapay/initialize-payment';

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $uri,
            // You can set any number of default request options.
            'timeout' => 120.0,
        ]);

        try {
            // make the request
            $response = $client->request('POST', $uri, [
                'form_params' => [
                    'token' => $token,
                    'amount' => $amount,
                    'msisdn' => $msisdn,
                    // 'receiver_msisdn' => '0788354222',
                    'external_transaction_id' => $external_transaction_id,
                    'from_msg' => $from_msg,
                    'to_msg' => $to_msg,
                ]
            ]);
        } catch (RequestException $e) {
            return response()
                ->json(['error' => 'Payment Sever Error!'], 401);
        } catch (GuzzleException $e) {
            return response()
                ->json(['error' => 'Payment Sever Error!'], 401);
        }

        $body = (string) $response->getBody();
        $action = json_decode($response->getBody())->action;
        $message = json_decode($response->getBody())->message;

        // $transaction->update(
        //     [
        //         'request_response_body' => json_decode($body, true),
        //     ]
        // );


        if ($action != 200) {
            return response()
                ->json(['status' => 2, 'message'  => $message]);
        }

        return response()
            ->json(['status' => 0, 'message'  => $message,'action' => $action,'body' => $body]);
    }
}