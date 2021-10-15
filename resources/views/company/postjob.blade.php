@extends('layouts.master')
@section('title','POST JOB')
@section('content')
<div style="margin:25px;">
<h1 style="font-size:50px;text-align: center;">POST A JOB</h1>
<form style="width:70%;margin:auto;" action="{{route('storejob')}}" method="post">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cn">Company name</label>
      <input type="text" class="form-control" name="companyname" id="cn" placeholder="Company name">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Company Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Company Email">
    </div>
  </div>
  <div class="form-group">
    <label for="job-disc">Job Description</label>
    <textarea class="form-control" name="discription" rows="4" placeholder="Job description .. "></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="salary">Salary</label>
      <input type="number" class="form-control" name="salary" id="salary" placeholder="Salary">
    </div>
    <div class="form-group col-md-4">
      <label for="email">Job Catagory</label>
      <select id="inputState" name="catagory" class="form-control">
        <option selected>Choose...</option>
        @foreach($catagory as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="email">Job Type</label>
      <select id="inputState" name="type" class="form-control">
        <option selected>Choose...</option>
        <option value="Full-time">Full time</option>
        <option value="Part-time">Part time</option>
        <option value="Internship">Internship</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputState">City</label>
      <select id="inputState" name="city" class="form-control">
        <option selected>Choose...</option>
        @foreach($city as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">State</label>
      <select id="inputState" name="state" class="form-control">
        <option selected>Choose...</option>
        <option value="Punjab">Punjab</option>
        <option value="Kpk">Kpk</option>
        <option value="Sindh">Sindh</option>
        <option value="Balochistan">Balochistan</option>
        <option value="Capital">Capital</option>
      </select>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary btn-block">Post</button>
</form>
</div>
@endsection