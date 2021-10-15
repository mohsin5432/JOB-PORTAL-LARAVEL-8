@extends('layouts.master')
@section('title','Jobs')
@section('content')
<div style="display:flex;margin: 30px auto;flex-flow:wrap;justify-content:space-between;padding:15px;">
<div style="padding:50px;flex-basis: 70%;background-color:rgb(240,240,240);">
    <h1>Company Name: {{$job->companyname}}</h1>
    <h3>Job Catagory: {{$job->catagory->name}}</h3>
    <h3>Job Type: {{$job->type}}</h3>
    <h3>Company Address: {{$job->address}},{{$job->city->name}},{{$job->state}}</h3>
    <br>
    <h3>Job Description</h3>
    <p>{{$job->discription}}</p>
    <span>expected salary: <b>{{$job->salary}}</b> pkr, &nbsp posted on: <b>{{$job->created_at->format('Y-m-d \a\t  h:i a')}}</b> </span>
    <br>
    <br>
    <a href="{{URL::to('/jobapply', $job->email)}}" class="btn btn-primary btn-block" style="border-radius:50px;text-align:center">Apply Now</a>
</div>

<div class="card" style="flex-basis:20%;height: fit-content;background-color:rgb(250,250,250);text-align:center;">
            <h3 class="card-header">Latest Jobs</h3>
            @foreach ($latestjob ?? '' as $ljob)
            <div class="card-body">
            @if($ljob->type == 'Part-time')
            <h4 class="head-purple m-auto">Part-time</h4>
            @elseif($ljob->type == 'Full-time')
            <h4 class="head-blue  m-auto">Full-time</h4>
            @elseif($ljob->type == 'Internship')
            <h4 class="head-yellow  m-auto">Internship</h4>
            @endif
                 <p class="card-text">{{$ljob->catagory->name}} job at {{$ljob->companyname}}</p>
                 <p class="card-text">posted on {{$ljob->created_at->format('Y-m-d')}}</p>
                 <a href="{{URL::to('/joblist/jobdetail', $ljob->id)}}" class="btn btn-primary">view details</a>
            </div>
            @endforeach
 </div>
@endsection