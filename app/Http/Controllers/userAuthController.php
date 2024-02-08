<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event\UserCreated;

class userAuthController extends Controller
{
    //
    public function index(){
        $a1=array("a"=>"red","b"=>"green");
        $a2=array("c"=>"blue","b"=>"yellow");
        $data = array_merge($a1,$a2);

        event( new UserCreated($data));
    }

    public function test(Request $request){
            
        if($request->all()){

            // $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // // Add more fields as needed
            // ]);
            
            $name = $request->name;
            $email = $request->email;
            $image = $request->file('image');


            $input = $request->all();
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $input['image']);

            
            $data =  ['name' => $name,
                        'email' => $email];
                
            

            $table_view =  view("/test",['name' =>  $name, 'email' => $email , 'data' => $data, 'image' => $imageName])->render();
            return response()->json(['succes' => true, 'data' => $table_view]);

        }else{
            return view('/test');
            
           // return  view("/test",['html' => $html])->render();
           //return response()->json(['succes' => true, 'table_view' => $table_view]);

        }  
    }




    

  

}
