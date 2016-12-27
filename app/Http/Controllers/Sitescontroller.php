<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Sitescontroller extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about() {
        $people=['Taylor Orwell','Jeffray Way','Happy Peter'];
        //$people=[];
        return view('sites.about',compact('people'));
    }
    public function content(){
        return view('sites.content');
    }
}
