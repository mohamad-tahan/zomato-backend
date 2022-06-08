<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function signUp(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash("sha256", $request->password);
        $user->usertype_id = 0;
       
        $user->save();
        
        return response()->json([
            "status" => "User Saved"
        ], 200);
    }
   
    public function signIn(Request $request){
        
        $email = $request->email;
        $password = hash("sha256", $request->password);

        $users = User::where("email", $email )->where("password", $password )->get();
        //echo count($users);
        if(count($users) == 0){
        return response()->json([
            "status" => "Not Found"
           
        ], 200);
    }
        return response()->json([
            "status" => "User logged in",
            "type" => $users[0]["usertype_id"]
           
        ], 200);
        
        
    
    }

    public function addReview(Request $request){
        $rating = new Rating();
        $rating->stars = $request->stars;
        $rating->reviews = $request->reviews;
        $rating->restaurant_id = $request->restaurant_id;
        $rating->customer_id = $request->customer_id;
        $rating->pending = 1;

        $rating->save();
        
        return response()->json([
            "status" => "Rating Saved"
        ], 200);



    }

    public function updateProfile(Request $request,$id){

   
        $user = User::find($id);
        

         if( $request->name){
             $user->name =  $request->name;
            $user->update();
         }
         if( $request->email){
            $user->email =  $request->email;
           $user->update();
        }
        if( $request->password){
            $user->password =  hash("sha256", $request->password);
           $user->update();
        }
         
         return response()->json([
            "status" =>  $user
        ], 200);
        }
  
}
