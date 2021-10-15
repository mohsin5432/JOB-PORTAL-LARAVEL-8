@extends('admin.dashboard')
@section('content')

<h1 style="text-align:center;">CATAGORIES</h1>
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
  @foreach ($catagory ?? '' as $cat)
    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td><a class="btn btn-outline-danger" href="{{URL::to('/deletecatagory', $cat->id)}}" onclick="return confirm ('Are you sure to delete this catagory?')" ><i class="far fa-trash-alt"></i></a></td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>

<div style="flex-basis:40%;">
<form action="{{route('storecatagory')}}" method="post">
@csrf
  <div class="form-group">
    <label for="exampleInputcat">Add Catagory</label>
    <input type="text" class="form-control" name="cat" id="exampleInputcat" placeholder="Enter Catagory Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


</div>

@endsection