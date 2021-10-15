<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use App\Models\User;
use App\Models\city;
use App\Models\catagory;
use App\Models\employ;
use App\Mail\TestMail2;
use Illuminate\Support\Facades\Mail;
use Auth;
use Image;
use PDF;

class jobcontroller extends Controller
{
    public function createjob() {
        $city = city::all();
        $catagory = catagory::all();
        return view ("/company/postjob")->with(['city'=>$city,'catagory'=>$catagory]);
    }
    public function storejob(Request $request) {
        $job = new job;
        $job->companyname = $request->get('companyname');
        $job->email = $request->get('email');
        $job->discription = $request->get('discription');
        $job->salary = $request->get('salary');
        $job->catagory_id = $request->get('catagory');
        $job->type = $request->get('type');
        $job->address = $request->get('address');
        $job->city_id = $request->get('city');
        $job->state = $request->get('state');
        $job->user_id = $request->user()->id;
        $job->save();
        return redirect("/home");
    }
    public function editjob($id) {
        $job = job::find($id);
        $city = city::all();
        $catagory = catagory::all();
        return view ("/company/updatejob")->with(['job'=>$job,'city'=>$city,'catagory'=>$catagory]);
    }
    public function updatejob(Request $request, $id) {
        $job = job::find($id);
        $job->companyname = $request->get('companyname');
        $job->email = $request->get('email');
        $job->discription = $request->get('discription');
        $job->salary = $request->get('salary');
        $job->catagory_id = $request->get('catagory');
        $job->type = $request->get('type');
        $job->address = $request->get('address');
        $job->city_id = $request->get('city');
        $job->state = $request->get('state');
        $job->user_id = $request->user()->id;
        $job->save();
        return redirect("/home");
    }
    public function deletejob($id) {
        job::destroy($id);
       return redirect('/home');
    }

    public function updateprofile(Request $request) {
        $company = User::find(auth()->user()->id);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            if( $company->avatar == "default.png"){
                Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'. $filename));
            }
            else{
                unlink(public_path('/uploads/avatars/'. $company->avatar));
                Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'. $filename));
            }
            $company = Auth::user();
            $company->avatar= $filename;
        }
        $company->name = $request->get('name');
        $company->save();
        return redirect("/home");
    }

    public function employlist() {
        $employ = employ::orderBy('created_at', 'DESC')->paginate(5);
        return view ("/company/employlist")->with(['employs'=>$employ]);
    }
    public function employdetails($id) {
        $employ = employ::find($id);
        return view ("/company/employdetail")->with(['employ'=>$employ]);
    }
    public function hireemp($email){
        $details = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'msg' =>  "A company is interested in you",
        ];
        Mail::to($email)->send(new TestMail2($details));
        return back();
    }

    public function createPDF($id) {
        // retreive all records from db
        $employ = employ::find($id);
  
        // share data to view
        view()->share('employ',$employ);
        $pdf = PDF::loadView('pdf_view', $employ);
  
        // download PDF file with download method
        return $pdf->download('cv.pdf');
      }

    public function __construct(){
        $this->middleware('role:company');
    }
}