<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Menathchefs;

class HomeController extends Controller
{
    public function index(){
        return view('admin_dashboard');
    }
    public function welcome(){
        $data = food::all();
        $data2 = menathchefs::all();
        return view('home',compact("data","data2"));
    }

}
