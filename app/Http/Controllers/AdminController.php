<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function users(){
        $data=user::all(); // declare fetching data as a variable

        return view("admin_users",compact("data")); //include fetching data
    }

    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }

}
