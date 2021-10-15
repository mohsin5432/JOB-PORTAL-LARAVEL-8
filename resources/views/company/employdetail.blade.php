@extends('layouts.master')
@section('title','Jobs')
@section('content')
<div style="width:80%;border:solid;border-color:rgb(200,200,200);margin:40px auto;padding:25px;background-color:rgb(240,240,240);">
<h1 style="text-align:center;margin:20px;">Personal Information</h1>
    <div style="display:flex;justify-content:space-between;">
        <div>
        <h3>NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$employ->user->name}}</h3>
        <h3>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$employ->user->email}}</h3>
        <h3>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:+92{{$employ->phone}}</h3>
        <h3>Address : {{$employ->address}} , {{$employ->city->name}} , {{$employ->state}}</h3>
        <h3>Gender&nbsp;&nbsp;: {{$employ->gender}}</h3>
        </div>
        <div>
        <img src="/uploads/avatars/{{$employ->user->avatar}}" alt="" width="250" height="250">
        </div>
    </div>
    <hr style="width:70%;margin:30px auto;background-color:black;">
    <div style="display:flex;justify-content:space-between;">
        <div style="flex-basis:70%;">
            <h2>Summary :</h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$employ->summary}}</p>
        </div>
        <div>
        <a class="btn btn-primary" href="{{URL::to('/hireemploy', $employ->user->email)}}">Hire Him</a>
            &nbsp;
        <a class="btn btn-info" href="{{URL::to('/employee/pdf', $employ->user_id)}}">Download CV</a>
        </div>
    </div>
    <h1 style="text-align:center;margin:20px;">Educational Details</h1>
    <h3>Qualification: {{$employ->qualification}}<h3>
    <h3>Level Of Education: {{$employ->edu}}</h3>
    <h3>Institution : {{$employ->institution}}</h3>
    <h3>Date Acquired: {{$employ->acquired}}</h3>
</div>
@endsection