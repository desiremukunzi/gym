<?php

namespace App\Http\Controllers;
use App\attendance;
use App\subscription;
use App\sport;
use App\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class AttendanceController extends Controller
{
    public function create(Request $request)
   {
   			       echo $user=auth('admin')->user()->id;
   			       $request->client_id;
   	           $sports=sport::all();
   	           foreach ($sports as $key => $sport) {
   	           $sport_=$sport->name;
   	           if($request->$sport_) {          
               $client_=$request->$sport_;
               $attendance = attendance::create(
               [
               'admin_id' => $user,
               'client_id' =>$client_,
               'sport_id' => $sport->id,
             
           ]
       );
             }
    }
    return redirect()->back()->with('success',"saved");
   }

    public function from_to(Request $request)
    {
     $from=$request->from;
     $to=$request->to;
     $id=$request->id;

     $sports=subscription::with('sport')->where('client_type_id',$id)->get();

     $clients=client::where('client_type_id',$id)->get();
     
     $attendances=attendance::with('sport')->get();
     return view('multiauth::admin.attendance_report',compact('clients','attendances','sports','id','from','to'));

 }

  public function attendance_details($client_id,$from,$to,$sport2)
    {
     $attendances=attendance::with('sport','client')->where('created_at','>=',$from)->where('created_at','<=',$to)->where('client_id',$client_id)->where('sport_id',$sport2)->get();
     return view('multiauth::admin.attendance_details',compact('attendances','id','from','to'));

 }

}
