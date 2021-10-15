<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\picture;
use App\Models\job;
use App\Models\employ;
use App\Models\User;
use App\Models\city;
use App\Models\catagory;
use Auth;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //public function index()
    //{
    //    return view('home');
    //}

    public function homepage() {
        $jobs = job::all()->sortByDesc("created_at")->take(4);
        $myjobs = job::where('user_id',auth()->user()->id)->orderByDesc('created_at')->paginate(4);
        $employ = employ::all();
        $catagory = catagory::all();
        return view ("homemy")->with(['jobs'=>$jobs,'myjobs'=>$myjobs,'employ'=>$employ,'catagory'=>$catagory]);
    }
    public function picupload(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            $delete = User::find(auth()->user()->id);
            if( $delete->avatar == "default.png"){
                Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'. $filename));
            }
            else{
                unlink(public_path('/uploads/avatars/'. $delete->avatar));
                Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'. $filename));
            }
            $user = Auth::user();
            $user->avatar= $filename;
            $user->save();
            return redirect('/home');
        }

        return redirect('/home');
    }

    public function addpicture(){
        return view('/picupload');
    }
    public function editprofile() {
        $city = city::all();
        $employ = employ::find(auth()->user()->id);
        return view ("updateprofile")->with(['employ'=>$employ,'city'=>$city]);
    }

}
