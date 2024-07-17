<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;


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

    public function deletemenu($id){
        $data=food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu(){
        $data = food::all();
        return view("admin_foodmenu", compact('data'));
    }

    public function upload(Request $request){
        $data = new food;

        // image will save in foodimage folder in public folder>>>
        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image = $imagename;

        //save the title
        $data->title = $request->title;

        //save the price
        $data->price = $request->price;

        //save the description
        $data->description = $request->description;

        // apply save
        $data->save();

        return redirect()->back();
    }

}
