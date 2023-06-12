@extends('layouts.app')
@section('content')
<form action="{{route('storeproduct')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Product</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product">
    <br><br>
  </div>
  <br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection