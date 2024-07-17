<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class HomeController extends Controller
{
    public function index(){
        return view('admin_dashboard');
    }
    public function welcome(){
        $data = food::all();
        return view('home',compact("data"));
    }

}
