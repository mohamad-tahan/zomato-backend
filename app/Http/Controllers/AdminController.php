<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
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


}
