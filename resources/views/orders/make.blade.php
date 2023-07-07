@extends('layouts.app')
@section('content')
<form action="{{route('storeorder')}}" method="post">
    @csrf
<div class="btn-group">
<select name="customerID" id="">
  @foreach($customers as $customer)
  <option value="{{$customer->id}}">{{$customer->name}}</option>
  @endforeach
</select>
</div>
<div class="btn-group">
<select name="productID" id="">
  @foreach($products as $product)
  <option value="{{$product->id}}">{{$product->name}}</option>
  @endforeach
</select>
</div>
<br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<!-- Button trigger modal -->


<!-- Modal -->





@endsection