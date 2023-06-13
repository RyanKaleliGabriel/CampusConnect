@extends('layouts.app')
@section('content')
<form action="{{route('updateorder', $order->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$order->id}}">
  <div class="form-group">
    <label for="exampleInputEmail1">order Name</label>
    <div class="btn-group">
  <select name="customerID" id="">
  @foreach($orders as $order)
  <option value="{{$order->customer->id}}">{{$order->customer->name}}</option>
  @endforeach
</select>
</div>
<div class="btn-group">
<select name="productID" id="">
  @foreach($orders as $order)
  <option value="{{$order->product->id}}">{{$order->product->name}}</option>
  @endforeach
</select>
</div>
<br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection