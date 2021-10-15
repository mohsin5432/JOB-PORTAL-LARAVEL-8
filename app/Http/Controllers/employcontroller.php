<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use App\Models\employ;
use App\Models\city;
use App\Models\catagory;
use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Auth;
use Image;


class employcontroller extends Controller
{
    public function createprofile() {
        $city = city::all();
        return view ("/employ/employdata")->with(['city'=>$city]);
    }
    public function employdata(Request $request) {
        $employ = new employ;
        $employ->user_id = $request->user()->id;
        $employ->dob = $request->get('dob');
        $employ->phone = $request->get('phone');
        $employ->gender = $request->get('gender');
        $employ->address = $request->get('address');
        $employ->summary = $request->get('summary');
        $employ->qualification = $request->get('qualification');
        $employ->city_id = $request->get('city');
        $employ->state = $request->get('state');
        $employ->edu = $request->get('edu');
        $employ->acquired = $request->get('acquired');
        $employ->institution = $request->get('institution');
        $employ->save();
        return redirect("/home");
    }
    public function editprofile() {
        $city = city::all();
        $employ = employ::find(auth()->user()->id);
        return view ("updateprofile")->with(['employ'=>$employ,'city'=>$city]);
    }
    public function updateprofile(Request $request) {
        $employ = employ::find(auth()->user()->id);
        $employ->dob = $request->get('dob');
        $employ->phone = $request->get('phone');
        $employ->gender = $request->get('gender');
        $employ->address = $request->get('address');
        $employ->summary = $request->get('summary');
        $employ->qualification = $request->get('qualification');
        $employ->city_id = $request->get('city');
        $employ->state = $request->get('state');
        $employ->edu = $request->get('edu');
        $employ->acquired = $request->get('acquired');
        $employ->institution = $request->get('institution');
        $employ->save();
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
        }
        return redirect("/home");
    }
    public function viewjobs() {
        $jobs = job::orderBy('created_at', 'DESC')->paginate(5);
        return view ("/employ/joblist")->with(['jobs'=>$jobs]);
    }
    public function viewjobsbycatagory($catagory) {
        $jobs = job::where('catagory_id',$catagory)->paginate(5);
        $cat = catagory::find($catagory);
        return view ("/employ/joblist")->with(['jobs'=>$jobs,'heading'=>$cat->name]);
    }
    public function jobdetail($id) {
        $jobs = job::find($id);
        $latestjobs = job::all()->sortByDesc("created_at")->take(3);
        return view ("/employ/jobdetail")->with(['job'=>$jobs,'latestjob'=>$latestjobs]);
    }
    public function jobapply($email){
        $details = employ::find(auth()->user()->id);
        $details->name= auth()->user()->name;
        $details->email= auth()->user()->email;
        Mail::to($email)->send(new TestMail($details));
        return back();
    }
    public function __construct(){
        $this->middleware('role:employ');
    }
}