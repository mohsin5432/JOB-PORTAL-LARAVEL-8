@extends('layouts.master')
@section('title','Jobs')
@section('content')
<h1 style="text-align:center;margin:20px;">@if( $heading ?? ''){{$heading}}@endif Jobs</h1>
@foreach ($jobs ?? '' as $job)
<div class="card" style="width:80%;margin:10px auto;background-color:rgb(240,240,240);">
  <div class="card-body">
    <h4 class="card-title">{{$job->catagory->name}}</h4>
    <h5 class=""><i class="fas fa-map-marker-alt"></i> {{$job->city->name}},{{$job->state}}</h3>
    <p class="card-text">{{str_limit($job->discription, $limit = 120, $end = ' ...')}}</p>
    <p><i class="fas fa-stopwatch"></i> {{$job->created_at->format('Y-m-d')}} &nbsp;&nbsp;<i class="fas fa-money-bill"></i> {{$job->salary}} pkr</p>
    <a href="{{URL::to('/joblist/jobdetail', $job->id)}}" class="btn btn-primary">View Detail</a>
  </div>
</div>
@endforeach
<div class="d-flex justify-content-center">
    {{ $jobs->links() }}
</div>

@endsection