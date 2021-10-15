@extends('layouts.master')
@section('title','Jobs')
@section('content')
<div style="margin:25px auto;">
<h1 style="font-size:50px;text-align: center;">Update your Profile</h1>
<form style="width:70%;margin:auto;" action="{{route('addprofile')}}" method="post">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Name">Name</label>
      <input type="text" class="form-control" value="{{auth()->user()->name}}" id="cn" Disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" value="{{auth()->user()->email}}" Disabled>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="dob">Date Of Birth</label>
      <input type="date" name="dob" class="form-control" id="dob">
    </div>
    <div class="form-group col-md-4">
      <label for="Phone">Phone</label>
      <input type="number" name="phone" class="form-control" id="phone" placeholder="03123456789">
    </div>
    <div class="form-group col-md-4">
      <label for="gender">Gender</label>
      <select id="inputState" name="gender" class="form-control">
        <option selected>Choose...</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
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
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="hel">Highest Education Level</label>
      <input type="text" name="edu" class="form-control" id="hel" placeholder="undergraduate/graduate">
    </div>
    <div class="form-group col-md-6">
      <label for="da">Date Acquired</label>
      <input type="date" name="acquired" class="form-control" id="da" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="hel">Institution Name</label>
      <input type="text" name="institution" class="form-control" id="hel" placeholder="university/school name">
    </div>
    <div class="form-group col-md-6">
      <label for="da">Qualification</label>
      <input type="text" name="qualification" class="form-control" id="da" placeholder="qualification" >
    </div>
  </div>

  <div class="form-group">
    <label for="summary">Summary</label>
    <textarea class="form-control" name="summary" rows="4" placeholder="brief about yourself ..."></textarea>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Update</button>
</form>
</div>
@endsection