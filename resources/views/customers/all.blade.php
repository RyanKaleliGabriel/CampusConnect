@extends('layouts.app')

@section('content')

<h2>Customers</h2>
  <a href="{{ route('createcustomer')}}" class="btn btn-secondary mb-2">Add new Customer</a>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Customer Number</th>
      <th scope="col">Customer Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->name}}</td>
      <td>
      <form action="{{route('deletecustomer', $customer->id)}}" method="post">
      @csrf 
      @method('DELETE')
      
      <a href="{{route('editcustomer', $customer->id)}}" class="btn btn-primary">Edit</a>
      <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection