<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\reg;
use Validator;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    {
        $this->middleware('auth:api',[
            'except' => ['register' , 'login']
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $fill = array (

            'FName' => 'required|string',
            'LName' => 'required|string',
            'Appointment' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:register',
            'Password' => 'required|string|confirmed|min:8'
        );

        $validation = Validator::make($request->all(), $fill);
        if($validation->fails()){
            return response()->json($validation->errors()->toJson(), 401) ;
        }
        $user = reg::create(array_merge(
            $validation->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
                'massage'=>'User Registered',
                'register'=>$user
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $fill = array (
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        );
        $validation = Validator::make($request->all(), $fill);
        if($validation->fails()) {
            return response()->json($validation->errors(),422);
        }
        if (!$token=auth()->attempt($validation->validated())){    
            return response()->json(['error'=>'Unauthorized'], 401);
        }
        return $this->NewToken($token);
    }

    public function NewToken($token){
        return response()->json([
            'access'=>$token,
            'type'=>'bearer',
            'expires'=>auth()->factory()->getTTL()*60,
            'userInfo'=>auth()->user()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userinfo()
    {
        return response()->json(auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Logout']);
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
