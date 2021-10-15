@extends('layouts.master')
@section('title','All Employ')
@section('content')
<h1 style="text-align:center;margin:20px;">All Employs</h1>
    @if(!$employs->isEmpty())
    @foreach ($employs ?? '' as $employ)
                <div class="card" style="width:1000px;margin:20px auto;background-color:rgb(250,250,250);">
                    <div class="row card-body">
                    <img class="" style="width:200px;" src="/uploads/avatars/{{$employ->user->avatar}}" alt="sans"/>
                       <div class="col-sm-4">
                          <h5 class="card-title"><b>{{$employ->user->name}}</b></h5>
                           <p class="card-text">{{$employ->qualification}}</p>
                           <p class="card-text">City of Residence : {{$employ->city->name}}</p>
                           <p class="card-text">State : {{$employ->state}}</p>
                           <a href="{{URL::to('/employlist/employdetail', $employ->user_id)}}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
    @endforeach
    <div class="d-flex justify-content-center">
    {{ $employs->links() }}
    </div>
@else
<h1 style="font-size:50px;text-align: center;margin-top:65px;">{ Sorry No Employ Available Now }</h1>
@endif                  
@endsection