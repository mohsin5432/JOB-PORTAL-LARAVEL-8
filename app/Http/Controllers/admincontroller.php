<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\city;
use App\Models\user;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function users() {
        $user = user::all();
        return view ("/admin/users")->with(['users'=>$user]);
    }
    public function createcatagory() {
        $catagory = catagory::all();
        return view ("/admin/catagory")->with(['catagory'=>$catagory]);
    }
    public function storecatagory(Request $request) {
        $catagory = new catagory;
        $catagory->name =$request->get('cat');
        $catagory->save();
        return back();
    }
    public function deletecatagory($id) {
        catagory::destroy($id);
       return back();
    }
    public function createcity() {
        $city = city::all();
        return view ("/admin/city")->with(['city'=>$city]);
    }
    public function storecity(Request $request) {
        $city = new city;
        $city->name =$request->get('city');
        $city->save();
        return back();
    }
    public function deletecity($id) {
        city::destroy($id);
       return back();
    }
    public function __construct(){
        $this->middleware('role:superadministrator');
    }
}
