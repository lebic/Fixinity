<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as Req;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user = User::all();
        $request = Req::all();
        return view('company-dashboard', ['user' => $user, 'request' => $request]);

//         // $user = DB::table('users')->get();

  

//         $type = Auth::user()->type;
//         $checkrole = explode(',', $type);
//         dd($type);
//         if (in_array('company', $checkrole)) {
//             return view('company-dashboard');
//         } else {
//             return view('client-dashboard');
         
//         }
//     }


//         //dd($request);

//         // dd($user);
        

    }



    public function showDefault()
    {
       /*  $user = User::find($id);
        //             users_id=forgien_ky, 
        $request = req::where("users_id", "=", "$id")->get();

        return view('company-dashboard', ['user' => $user, 'request' => $request]); */
      /*   $request = Req::all(); */
   
        $user = Auth::user();
        $userid = Auth::user()->id;
        $cat = Auth::user()->category;

        $allrequest = DB::table("request")->get();
        $catrequest =  
        DB::table("request")
        ->join("users", function($join){
            $join->on("request.users_id", "=", "users.id");
        })
        ->select("*", "request.id as request_id")
        ->where("categories", "=", "$cat")
        ->get();

        $request = 
        DB::table("request")
        ->join("users", function($join){
            $join->on("users.id", "=", "request.users_id");
        })
        ->get();

        $offers = 
        DB::table("request") ->join("users", function($join){
            $join->on("users.id", "=", "request.users_id");
        })
       ->join("offers", function($join){
            $join->on("offers.request_id", "=", "request.id");
        })
   
        
        ->select("*", "offers.id as offers_id")
        ->where("owner_id", "=", "$userid") 
        ->get();
        $clientoffers = 
        DB::table("users") ->join("offers", function($join){
            $join->on("users.id", "=", "offers.owner_id");
        })
       ->join("request", function($join){
            $join->on("offers.request_id", "=", "request.id");
        })
      ->select("*", "offers.id as offers_id")
        ->where("users_id", "=", "$userid") 
        ->get();

        $clientrequest = 
        DB::table("request")
        ->join("users", function($join){
            $join->on("users.id", "=", "request.users_id");
        })->select("*", "request.id as request_id")->where("users_id", "=", "$userid")
        ->get();


        $countopen = Req::where("status", "=", "open",)->where("categories", "=", "$cat")->count();
        $countpending = Req::where("status", "=", "pending")->where("company_id", "=", "$userid")->count();
        $countfinished = Req::where("status", "=", "close")->where("company_id", "=", "$userid")->count();
       
        $clientcountopen = Req::where("status", "=", "open",)->where("users_id","=", "$userid")->count();
        $clientcountpending =  DB::table("users") ->join("offers", function($join){
            $join->on("users.id", "=", "offers.owner_id");
        })
       ->join("request", function($join){
            $join->on("offers.request_id", "=", "request.id");
        })
      ->select("*", "offers.id as offers_id")
      ->where("users_id", "=", "$userid")
      ->where("offerstatus","=","pending") ->count();
        $clientcountfinished = DB::table("users") ->join("offers", function($join){
            $join->on("users.id", "=", "offers.owner_id");
        })
       ->join("request", function($join){
            $join->on("offers.request_id", "=", "request.id");
        })
      ->select("*", "offers.id as offers_id")
        ->where("users_id", "=", "$userid")
        ->where("offerstatus","=","accepted") ->count();
       
        $type = Auth::user()->type;
        $checkrole = explode(',', $type);
        if (in_array('company', $checkrole)) {
            return view('company-dashboard', ['user' => $user, 'request' => $request, 'countopen'=> $countopen,'countpending'=> $countpending, 'countfinished'=> $countfinished, 'catrequest'=> $catrequest, 'allrequest'=>$allrequest,'offers'=>$offers]);
        } else {
            return view('client-dashboard', ['user' => $user, 'clientrequest' => $clientrequest, 'clientcountopen'=> $clientcountopen,'clientcountpending'=> $clientcountpending, 'clientcountfinished'=> $clientcountfinished, 'catrequest'=> $catrequest, 'clientoffers'=>$clientoffers]);
        }
    }



    public function destroy($id)
    {
        //
    }
}