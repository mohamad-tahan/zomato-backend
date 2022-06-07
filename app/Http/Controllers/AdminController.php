<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function addResto(Request $request){
        $resto = new Restaurant;
        $resto->name = $request->name;
        $resto->description = $request->description;
        // $resto->image = $request->image;
        $resto->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }

    
    public function getAllRestos($id = null){
        if($id != null){
            
            $restos = Restaurant::find($id);
            //$restos = $restos? $restos->name : '';
        }else{
            $restos = Restaurant::all();
        }
        
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }

    public function getAllUsers($id = null){
        if($id != null){
            
            $users = User::find($id);
          
        }else{
            $users = User::all();
        }
        
        return response()->json([
            "status" => "All Users",
            "users" => $users
        ], 200);
    }

}
