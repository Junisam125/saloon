<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\reg;
use Validator;
use Illuminate\Support\Facades\Redirect;

class regController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("register");
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
        $reg = new reg;
        $reg->FName = $request->get ("FName");
        $reg->LName = $request->get ("LName");
        $reg->phone = $request->get ("phone");
        $reg->Appointment = $request->get ("Appointment");
        $reg->save();

        return Redirect ('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(reg $reg)
    {
        $reg = reg :: all();
        return view('admin' , ["reg" => $reg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( reg $reg , $id)
    {
        $reg = reg :: find($id);
        return view('update' , ["reg" => $reg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,reg $reg, $id)
    {
        $reg = reg :: find ($id);
        $reg->FName = $request->get ("FName");
        $reg->LName = $request->get ("LName");
        $reg->phone = $request->get ("phone");
        $reg->Appointment = $request->get ("Appointment");
        $reg->save();
        return Redirect ('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(reg $reg , $id)
    {
        $reg = reg :: find($id);
        $reg->delete();
        return Redirect('admin');
    }

    public function apidata(Request $request)
    {
        $fill = array(
            "FName"=>"required",
            "LName"=>"required",
            "phone"=>"required",
            "Appointment"=>"required"
        );

        $validation = Validator::make($request->all(), $fill);
        if($validation->fails()){
            return response()->json($validation->errors(), 401) ;
        }
        else {
            $reg = new reg;
        $reg->FName = $request->get("FName");
        $reg->LName = $request->get("LName");
        $reg->phone = $request->get("phone");
        $reg->Appointment = $request->get("Appointment");
        $saved = $reg->save();
        if($saved){
            return ["result" => "Data Save"];
        }
        else {
            return ["result" => "Data Not Save"];
        }
        }
        
    }

    public function apiupdate(Request $request)
    {
        $reg = reg::find ($request -> id);
        $reg->FName = $request->get ("FName");
        $reg->LName = $request->get ("LName");
        $reg->phone = $request->get ("phone");
        $reg->Appointment = $request->get ("Appointment");
        $saved = $reg->save();
        if($saved){
            return ["result" => "Data Save"];
        }
        else {
            return ["result" => "Data Not Save"];
        }
    }

    public function deletedate ($id)
    {
        $reg = reg :: find($id);
        $deleted = $reg->delete();
        return $deleted ? ["message" => "Data Deleted"] : ["message" => "Data Not Deleted"] ;
    }
}
