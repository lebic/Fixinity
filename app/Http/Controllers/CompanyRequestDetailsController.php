<?php

namespace App\Http\Controllers;

use App\Models\CompanyRequestDetails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\OfferRequest;
use Carbon\Carbon;

class CompanyRequestDetailsController extends Controller
{
    public function index()
    {
        return view('company-request-details');
     
    }

    public function showRequest($id)
    {
      
        //$request = get everything from the request table where id from rounte is id 
        //$user = get everything from the useres table where the request id is user id
        $companyoffers = 
        DB::table("users") ->join("offers", function($join){
            $join->on("users.id", "=", "offers.owner_id");
        })
       ->join("request", function($join){
            $join->on("request.id", "=", "offers.request_id");
        })
        ->select("*", "offers.id as offers_id")
        ->where("request_id", "=", $id) 
        ->get();
        
         $request= db::table('request')->WHERE("id", "=", "$id")->get();
      /*    $offers=db::table('offers')->WHERE("request_id", "=", "$id")->get(); */

        $client= db::table('users')->WHERE("id", "=", $request[0]->users_id)->get();
/*         $company= db::table('users')->WHERE("id", "=", $offers[0]->owner_id)->get();  */
        
       
        
        
        $type = Auth::user()->type;
        $checkrole = explode(',', $type);
        if (in_array('company', $checkrole)) {
            return view('request-details-company', ['request'=> $request[0],'client'=> $client[0]]) ;
        } else {
            return view('request-details-client', ['request'=> $request[0],'companyoffers'=>$companyoffers[0]]);
        }
    }
    public function showOffer($offerid)
    {
      
        //$request = get everything from the request table where id from rounte is id 
        //$user = get everything from the useres table where the request id is user id
       /*   $request= db::table('request')->WHERE("id", "=", "$id")->get(); */
      /*    $offers=db::table('offers')->WHERE("request_id", "=", "$id")->get(); */

/*         $client= db::table('users')->WHERE("id", "=", $request[0]->users_id)->get(); */
/*         $company= db::table('users')->WHERE("id", "=", $offers[0]->owner_id)->get();  */

$companyoffers = 
DB::table("users") ->join("offers", function($join){
    $join->on("users.id", "=", "offers.owner_id");
})
->join("request", function($join){
    $join->on("offers.request_id", "=", "request.id");
})
->select("*", "offers.id as offers_id")
->where("offers.id", "=", "$offerid") 
->get();
        
       
        
        
        $type = Auth::user()->type;
        $checkrole = explode(',', $type);
        if (in_array('company', $checkrole)) {
            return view('offer-details-company', ['companyoffers'=> $companyoffers[0]]) ;
        } else {
            return view('offer-details-client', ['companyoffers'=> $companyoffers[0]]);
        }
    }
    public function store(Request $request)
    {

        $open_request = new CompanyRequestDetails();

        $open_request->estimated_price = $request->price;
        $open_request->estimated_time = $request->date;


        $result = $open_request->save();

        if ($result)
            return redirect('')->with('success', 'Request Sent!');
        else
            return redirect('')->with('error', 'Problem Sending Request!');
    }


    public function destroy(Request $request)
    {
        $request->delete();
    
        return redirect('')->with('success','Offer deleted successfully');
    }

    public function finished(Request $request)
    {
        $request->status='close';
    
        return redirect('')->with('success','Offer deleted successfully');
    }

    public function send_offer(Request $request, $id)
    {
       
        $request->validate([
             /* 'title' => 'required', */
        // 'users_id' => 'required',
          /*   'estimated_price' => 'required',
            'estimated_start_time' => 'required',
            'estimated_end_time' => 'required', */
  
        ]);

$userid = Auth::user()->id;
        $open_request = new OfferRequest();

        $open_request->estimated_price = $request->estimated_price;
        // $open_request->users_id = $request->users_id;

        $open_request->estimated_start_time = Carbon::parse($request->date)->format('Y-m-d');
        $open_request->estimated_end_time = Carbon::parse($request->date)->format('Y-m-d');
        //$open_request->submit_image = $request->submit_image;
        $open_request->owner_id = $userid;
        $open_request->request_id = $id;
        $result = $open_request->save();

        if ($result)
            return redirect('dashboard')->with('success', 'Request Sent!');
        else
            return redirect('dashboard')->with('error', 'Problem Sending Request!');
    }
}