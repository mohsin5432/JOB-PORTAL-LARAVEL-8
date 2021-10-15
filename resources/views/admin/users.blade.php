@extends('admin.dashboard')
@section('content')


<div style="flex-basis:50%;">
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Registered As</th>
      <th>Date/Time</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users ?? '' as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->roles->first()->name}}</td>
      <td>{{$user->created_at->format('d-m-Y \a\t  h:i a')}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection