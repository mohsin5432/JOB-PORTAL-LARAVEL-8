<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobcontroller;
use App\Http\Controllers\employcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admincontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//all users
Route::get('/home',[HomeController::class,'homepage']);
Route::get('/', function () {return view('main');});

//for companies
Route::get('/postjob',[jobcontroller::class,'createjob']);
Route::post('/storejob',[jobcontroller::class,'storejob'])->name("storejob");
Route::get('/editjob/{id}',[jobcontroller::class,'editjob']);
Route::post('/updatejob/{id}',[jobcontroller::class,'updatejob'])->name("updatejob");
Route::get('/deletejob/{id}',[jobcontroller::class,'deletejob']);
Route::post('/updateprofilep',[jobcontroller::class,'updateprofile'])->name("updatecompanyprofile");
Route::get('/employlist',[jobcontroller::class,'employlist']);
Route::get('/employlist/employdetail/{id}',[jobcontroller::class,'employdetails']);
Route::get('/hireemploy/{email}',[jobcontroller::class,'hireemp']);
Route::get('/employee/pdf/{id}', [jobcontroller::class, 'createPDF']);


//for employes
Route::get('/joblist',[employcontroller::class,'viewjobs']);
Route::get('/joblist/catagory/{catagory}',[employcontroller::class,'viewjobsbycatagory']);
Route::get('/joblist/jobdetail/{id}',[employcontroller::class,'jobdetail']);
Route::get('/jobapply/{email}',[employcontroller::class,'jobapply']);
Route::get('/createprofile',[employcontroller::class,'createprofile']);
Route::post('/addprofile',[employcontroller::class,'employdata'])->name("addprofile");
Route::get('/editprofile',[HomeController::class,'editprofile']);
Route::post('/updateprofile',[employcontroller::class,'updateprofile'])->name("updateprofile");

//for admin
Route::get('/admin/users',[admincontroller::class,'users']);
Route::get('/admin/addcatagory',[admincontroller::class,'createcatagory']);
Route::post('/storecatagory',[admincontroller::class,'storecatagory'])->name('storecatagory');
Route::get('/deletecatagory/{id}',[admincontroller::class,'deletecatagory']);
Route::get('/admin/addcities',[admincontroller::class,'createcity']);
Route::post('/storecities',[admincontroller::class,'storecity'])->name('storecity');
Route::get('/deletecity/{id}',[admincontroller::class,'deletecity']);



Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');