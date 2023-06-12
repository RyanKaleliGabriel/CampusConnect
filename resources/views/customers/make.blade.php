@extends('layouts.app')
@section('content')
<form action="{{route('storecustomer')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Customer Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Customer">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection