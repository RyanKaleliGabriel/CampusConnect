@extends('layouts.app')

@section('content')

<h2>Products</h2>
  <a href="{{ route('createproduct')}}" class="btn btn-secondary mb-2">Add new Product</a>
<div class="list-group">
  <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    Customers
  </a> -->
  @foreach($products as $product)
  <a href="#" class="list-group-item list-group-item-action">{{$product->id}}. {{$product->name}}</a>
  <a href="{{route('editproduct', $product->id)}}" class="btn btn-primary">Edit</a>
  <form action="{{route('deleteproduct', $product->id)}}" method="post">
    @csrf 
    @method('DELETE')
  <button class="btn btn-danger" type="submit">Delete</button>
  </form>
  @endforeach
</div>
@endsection