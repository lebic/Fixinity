<?php

namespace App\Http\Controllers;

use App\Models\RequestSent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CategoriesController extends Controller
{
    public function categories()
    {
        return view('categories');
    }

    public function requests()
    {
        return view('requests');
    }

    public function plumbery()
    {
        return redirect('requests');
    }

    public function maintenance()
    {
        return redirect('requests');
    }

    public function electricity()
    {
        return redirect('requests');
    }

    public function send_request(Request $request)
    {
        //dd($request);
        $request->validate([
            /* 'title' => 'required', */
            // 'users_id' => 'required',
            'category' => 'required',
            'situation' => 'required',
            'title' => 'required',
            'text' => 'required',
            'image' => 'required|mimes:jpg,png',
            'date' => 'required',
        ]);

        $userid = Auth::user()->id;
        $open_request = new RequestSent();

        // $open_request->title = $request->title;
        // $open_request->users_id = $request->users_id;
        $open_request->categories = $request->category;
        $open_request->type = $request->situation;
        $open_request->title = $request->title;
        $open_request->description = $request->text;

        $open_request->pictures = $request->image;
        $open_request->date = Carbon::parse($request->date)->format('Y-m-d');
        //$open_request->submit_image = $request->submit_image;
        $open_request->users_id = $userid;
        $result = $open_request->save();

        if ($result)
            return redirect('dashboard')->with('success', 'Request Sent!');
        else
            return redirect('requests-form')->with('error', 'Problem Sending Request!');
    }

    public function show($id)
    {
        $id = Auth::id();
        $users = User::where("id", "=", "$id")->get();
        return view('displayuser', ['user' => $users]);
    }

    public function index()
    {
        $users = User::all();
        return view('allusers', ['user' => $users]);
    }
}
