<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFooter extends Controller
{
   public function testfooter() {
return view('footerTemplate');
   }

   public function index(){
    return view('homepage');
   }

   



}
