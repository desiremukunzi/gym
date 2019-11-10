<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function index()
   {
   	$payments=order::with('client')->orderBy('id','desc')->get();
   	
   	return view('admin.payments',compact('payments'));
   
   }
}
