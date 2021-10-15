@extends('layouts.master')
@section('title','Jobs')
@section('content')
<div style="margin:25px auto;">
<h1 style="font-size:50px;text-align: center;">Update your Profile</h1>
@if (Auth::user()->hasRole("employ"))
<form style="width:70%;margin:auto;" action="{{route('updateprofile')}}" method="post" enctype="multipart/form-data">
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
      <input type="date" name="dob" class="form-control" id="dob" value="{{$employ->dob}}">
    </div>
    <div class="form-group col-md-4">
      <label for="Phone">Phone</label>
      <input type="number" name="phone" class="form-control" id="phone" value="{{$employ->phone}}">
    </div>
    <div class="form-group col-md-4">
      <label for="gender">Gender</label>
      <select id="inputState" name="gender" class="form-control">
        <option selected>{{$employ->gender}}</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" value="{{$employ->address}}">
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputState">City</label>
      <select id="inputState" name="city" class="form-control">
        <option value="{{$employ->city->id}}" selected>{{$employ->city->name}}</option>
        @foreach($city as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">State</label>
      <select id="inputState" name="state" class="form-control">
        <option selected>{{$employ->state}}</option>
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
      <input type="text" name="edu" class="form-control" id="hel" value="{{$employ->edu}}">
    </div>
    <div class="form-group col-md-6">
      <label for="da">Date Acquired</label>
      <input type="date" name="acquired" class="form-control" id="da" value="{{$employ->acquired}}" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="hel">Institution Name</label>
      <input type="text" name="institution" class="form-control" id="hel" value="{{$employ->institution}}">
    </div>
    <div class="form-group col-md-6">
      <label for="da">Qualification</label>
      <input type="text" name="qualification" class="form-control" id="da" value="{{$employ->qualification}}" >
    </div>
  </div>

  <div class="form-group">
    <label for="summary">Summary</label>
    <textarea class="form-control" name="summary" rows="4">{{$employ->summary}}</textarea>
  </div>
  <div class="form-group">
  <label class="form-label" for="customFile">Picture Picture</label>
    <input type="file" class="form-control" id="customFile" name="avatar" accept="image/png, image/gif, image/jpeg">
    </div>  
  
  <button type="submit" class="btn btn-primary btn-block">Update</button>
</form>

@elseif (Auth::user()->hasRole("company"))
<form style="width:70%;margin:auto;" action="{{route('updatecompanyprofile')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Name">Name</label>
      <input type="text" class="form-control" value="{{auth()->user()->name}}" id="cn" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" value="{{auth()->user()->email}}" Disabled>
    </div>
  </div>
  <div class="form-group">
  <label class="form-label" for="customFile">Picture Picture</label>
    <input type="file" class="form-control" id="customFile" name="avatar" accept="image/png, image/gif, image/jpeg">
    </div> 
    <button type="submit" class="btn btn-primary btn-block mt-5">Update</button> 
  </form>  
@endif

</div>
@endsection