<?php

namespace App\Http\Controllers;

use App\client;
use App\client_type;
use App\duration;
use App\sport;
use App\subscription;
use Illuminate\Http\Request;


class InstitutionRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports=sport::all();
        $durations=duration::all();
        return view('multiauth::admin.institution_register',compact('sports','durations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_type=client_type::create([
            'name'=>$request->name
        ]);
        
        $id=client_type::orderBy('id','desc')->limit(1)->value('id');
        $request->tel;
        client::create([
            'name'=>$request->representative_name,
            'email'=>$request->email,
            'tel'=>$request->tel,
            'password'=>bcrypt($request->password),
            'client_type_id'=>$id,

        ]);
        $sports=sport::all();
        foreach ($sports as $key => $sport) {
               $sport_=$sport->name;
               if($request->$sport_) {          
        subscription::create([
        'client_type_id'=>$id,
        'duration_id'=>$request->duration,
        'sport_id'=>$request->$sport_,
        ]);
    }
}
     return redirect()->route('admin.institution')->with('message','done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
