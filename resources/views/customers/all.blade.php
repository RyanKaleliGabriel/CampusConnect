@extends('layouts.app')

@section('content')

<h2>Customers</h2>
  <a href="{{ route('createcustomer')}}" class="btn btn-secondary mb-2">Add new Customer</a>
<div class="list-group">
  <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    Customers
  </a> -->
  @foreach($customers as $customer)
  <a href="#" class="list-group-item list-group-item-action">{{$customer->id}}. {{$customer->name}}</a>
  <a href="{{route('editcustomer', $customer->id)}}" class="btn btn-primary">Edit</a>
  <form action="{{route('deletecustomer', $customer->id)}}" method="post">
    @csrf 
    @method('DELETE')
  <button class="btn btn-danger" type="submit">Delete</button>
  </form>
  @endforeach
</div>
@endsection