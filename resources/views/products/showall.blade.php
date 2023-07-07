@extends('layouts.app')

@section('content')

<h2>Products</h2>
  <a href="{{ route('createproduct')}}" class="btn btn-secondary mb-2">Add new Product</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Photo</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td><img src="{{ url('storage/'.$product->image) }}" alt="" title="" height="150" width="150" /></td>
      <td>
      <form action="{{route('deleteproduct', $product->id)}}" method="post">
        @csrf 
        @method('DELETE')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{$product->id}}" >
        Order
       </button>
        <a href="{{route('editproduct', $product->id)}}" class="btn btn-primary">Edit</a>
        <!-- <a href="{{route('editproduct', $product->id)}}" class="btn btn-secondary">Pay</a> -->
       <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      </td>
      <!-- Modal -->
      <td>
<div class="modal fade" id="exampleModalCenter-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{$product->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('storeorder')}}" method="post">
        @csrf
     <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product</label>
    <img src="{{ url('storage/'.$product->image) }}" alt="image" height="80" width="80">
    <input type="hidden" value="{{$product->id}}" name="productID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="mb-3">
      <br>
    <select name="customerID" id="" class='form-control'>
    @foreach($customers as $customer)
    <option value="{{$customer->id}}">{{$customer->name}}</option>
    @endforeach
</select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
</td>
    </tr>
    @endforeach 
  </tbody>
</table>

<!-- Button trigger modal -->





@endsection