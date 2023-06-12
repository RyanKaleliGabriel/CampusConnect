@extends('layouts.app')

@section('content')

<h2>Orders</h2>
<a href="{{ route('createorder')}}" class="btn btn-secondary mb-2">Add new Order</a>

<div class="list-group">
  <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    Customers
  </a> -->
  @foreach($orders as $order)
  <a href="#" class="list-group-item list-group-item-action">{{$order->id}}. {{$order->customer->name}}  {{$order->product->name}}</a>
  <a href="{{route('editorder', $order->id)}}" class="btn btn-primary">Edit</a>
  <form action="{{route('deleteorder', $order->id)}}" method="post">
    @csrf 
    @method('DELETE')
  <button class="btn btn-danger" type="submit">Delete</button>
  </form>
  @endforeach
</div>

@endsection