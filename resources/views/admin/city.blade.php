@extends('admin.dashboard')
@section('content')

<h1 style="text-align:center;">CITIES</h1>
<div style="display:flex;justify-content:space-between;margin-top:50px;">
<div style="flex-basis:50%;">
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($city ?? '' as $city)
    <tr>
      <th scope="row">{{$city->id}}</th>
      <td>{{$city->name}}</td>
      <td><a class="btn btn-outline-danger" href="{{URL::to('/deletecity', $city->id)}}" onclick="return confirm ('Are you sure to delete this city?')" ><i class="far fa-trash-alt"></i></a></td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>

<div style="flex-basis:40%;">
<form action="{{route('storecity')}}" method="post">
@csrf
  <div class="form-group">
    <label for="exampleInputcat">Add City</label>
    <input type="text" name="city" class="form-control" id="exampleInputcat" placeholder="Enter City Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


</div>

@endsection