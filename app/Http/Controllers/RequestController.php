<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Request as req;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $request = req::all();
        // $request = DB::select('select status from request');
        $request = collect(['status' => 'open','pending','close']);
        return view('client_dasboard',['request'=>$request]);
        // $status_open = DB::table('request')->WHERE('status = open')->get();
        // return view('client-dashboard', ['request' => $request, 'status' => $status_open]);
        // $status_pending = DB::select("SELECT * from request WHERE status = 'pending'");
        // $status_close = DB::select("SELECT * from request WHERE status = 'close'");


        // $request = DB::pluck('status');
        // $status = req::where("status", "=", "close")->get();
        return view('client-dashboard', ['request' => $request]);
    }

    public function show(req $req, $status)
    {
        // $request = Request::find($status);
        // $status = request::where("status", "=", "$status")->get();
        return view('client-dashboard', ['status' => $status, 'request' => $req]);
    }


    public function companyOffer(){

        return view('client-dashboard');

    }
    public function userRequest(){
        return view('client-dashboard');

    }


    public function destroy($id)
    {
        //
    }
}
