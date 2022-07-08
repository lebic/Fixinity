<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfferRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class OfferRequestController extends Controller
{
    public function send_request(Request $request)
    {
        //dd($request);
        $request->validate([
             /* 'title' => 'required', */
        // 'users_id' => 'required',
            'estimated_price' => 'required',
            'estimated_start_time' => 'required',
            'estimated_end_time' => 'required',
  
        ]);

$userid = Auth::user()->id;
        $open_request = new OfferRequest();

        $open_request->estimated_price = $request->estimated_price;
        // $open_request->users_id = $request->users_id;

        $open_request->estimated_start_time = Carbon::parse($request->date)->format('Y-m-d');
        $open_request->estimated_end_time = Carbon::parse($request->date)->format('Y-m-d');
        //$open_request->submit_image = $request->submit_image;
        $open_request->owner_id = $userid;
        $result = $open_request->save();

        if ($result)
            return redirect('dashboard')->with('success', 'Request Sent!');
        else
            return redirect('dashboard')->with('error', 'Problem Sending Request!');
    }
}