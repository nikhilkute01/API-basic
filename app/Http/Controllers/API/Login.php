<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\logindetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data=new logindetails;
        // $data->name = $request['name'];
        // $data->email=$request['email'];
        // $data->address=$request['address'];
        // $data->password=$request['password'];
        // $data->save();

        $validate=Validator::make($request->all(),[
            "name"=>['required'],
            "email"=>['required','email','unique:users,email'] ,
            "address"=>['required'],
            "password"=>['required','min:8']
        ]);
        if($validate->fails()){
                return response()->json($validate->messages(),400);
        }else{
            $data=[
                "name"=>$request->name,
                "email"=>$request->email,
                "address"=>$request->address,
                "password"=>Hash::make($request->password)
            ];
                DB::beginTransaction();
            try{
                logindetails::create($data);
                DB::commit();

            }catch(\Exception $e){
                DB::rollBack();
                dd($e->getMessage());
            }
        }
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
    $user=logindetails::find($id);

    if($user !=null){
        $response1=[
            "message"=> "user is found",
            "status"=>1,
            "data"=>$user
        ];
        return response()->json($response1,200);
    }else{
        $response1=[
            "message"=>"user is not found",
            "status"=>0,
        ];
        return response()->json($response1,200);
    }
    
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
