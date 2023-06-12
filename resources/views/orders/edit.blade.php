@extends('layouts.app')
@section('content')
<form action="{{route('updateorder', $order->id)}}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">order Name</label>
    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$order->id}}">
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$order->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection